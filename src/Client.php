<?php

namespace Cblink\Jddj;

use Mouyong\Foundation\AbstractClient;
use Cblink\Jddj\Exceptions\JddjApiException;

class Client extends AbstractClient
{
    const API = 'https://openapi.jddj.com/djapi/';
    const TEST_API = 'https://openapi.jddj.com/mockapi/';

    private $requestMethod = 'GET';

    public function get($uri, $data = [], $options = [])
    {
        $this->requestMethod = 'GET';

        return parent::get(...func_get_args());
    }

    public function post($uri, $data = [], $options = [])
    {
        $this->requestMethod = 'POST';

        return parent::post(...func_get_args());
    }

    private function getApiUrl($uri = '')
    {
        if ($this->app->options['debug'] ?? false) {
            return $this->formatUrl(static::TEST_API, $uri);
        }

        return $this->formatUrl(static::API, $uri);
    }

    private function formatUrl($domainUri, $requestUri)
    {
        return sprintf("%s/%s", rtrim($domainUri, '/'), ltrim($requestUri, '/'));
    }

    public function sign(array $data = []): array
    {
        // json 参数
        $params['jd_param_json'] = json_encode($data);

        // 配置参数
        $params['token'] = $this->app->options['token'];
        $params['app_key'] = $this->app->options['app_key'];

        // 固定格式参数
        $params['timestamp'] = date('Y-m-d H:i:s');
        $params['v'] = $this->app->options['version'];
        $params['format'] = 'json';

        $params['sign'] = $this->generateSign($params);

        return $params;
    }

    private function generateSign($params)
    {
        $stringToBeSigned = $this->paramsToString($params);
        return strtoupper(md5($stringToBeSigned));
    }

    private function paramsToString($params)
    {
        ksort($params);

        $sortedString = $this->app->options['secret'];
        foreach ($params as $k => $v)
        {
            $v = (string)$v;
            if("sign" !== $k /*&& strlen($v) > 0*/)
            {
                $v = ($this->requestMethod === 'GET') ? urlencode($v): $v;

                $sortedString .= "$k$v";
            }
        }

        $sortedString .= $this->app->options['secret'];

        return $sortedString;
    }

    public function request(string $method, string $uri, array $options = [], $retry = 1)
    {
        try {
            $rsp = $this->getClient()->request($method, $this->getApiUrl($uri), $options);
        } catch (\Throwable $e) {
            $this->app->log->info('request', [
                'method' => $method,
                'uri' => $uri,
                'options' => $options,
                'retry' => $retry,
            ]);
            $this->app->log->error("请求出现错误 code: {$e->getCode()} message: {$e->getMessage()}");
            throw new JddjApiException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

        try {
            return $this->castResponseToType($rsp);
        } catch (\Throwable $e) {
            $this->app->log->error("转换响应信息出现错误 error: {$e->getCode()} error_description: {$e->getMessage()} , request data ", $options);

            throw $e;
        }
    }

    public function castResponseToType($rsp)
    {
        if (!empty($this->app->options['http']['response_type']) && $this->app->options['http']['response_type'] === 'raw') {
            return $rsp;
        }

        $data = json_decode($rsp->getBody()->getContents(), true);

        if (empty($data)) {
            $this->app->log->error('响应数据为空');

            throw new JddjApiException('响应数据为空', 500);
        }

        // 接口返回值中的第一层code码为平台级状态码，第二层code码为业务级状态码，状态码为字符串型数据。
        // @see https://openo2o.jddj.com/staticnew/widgets/doc/portalCodes.html

        // 判断平台级有没有错误
        if (isset($data['code']) && intval($data['code']) != '0') {
            throw new JddjApiException($data['msg'], $data['code']);
        }

        // 判断业务级有没有错误
        if (!empty($data['data'])) {
            // 判断平台级有没有错误
            if (isset($data['data']['code']) && intval($data['data']['code']) != '0') {
                throw new JddjApiException($data['data']['msg'], $data['data']['code']);
            }
        }

        $this->app->log->info('响应信息', $data);


        return $data['data'] ?? $data;
    }

    public function rsp($data = '', $code = 0, $msg = 'success')
    {
        $data = json_encode(compact('data', 'code', 'msg'), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);

        echo $data;

        return $this;
    }
}