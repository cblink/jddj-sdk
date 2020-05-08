<?php

namespace Cblink\Jddj\Tool;

use Cblink\Jddj\Client;

class Tool extends Client
{
    const API = 'https://opentool.jddj.com/toolapi';
    const TEST_API = 'https://opentool.jddj.com/toolapi';

    /**
     * 图片上传接口
     *
     * https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=213&apiid=c8607543fde04c48a4f650e51f984b90
     *
     * @param string $imageBase64
     * @return mixed
     */
    public function imageUpload(string $imageBase64)
    {
        return $this->post('imageUpload', compact('imageBase64'));
    }

    /**
     * 文件上传接口
     *
     * @param string $fileBase64
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=213&apiid=55ccab405cb54ca982636433dd80180b
     */
    public function fileUpload(string $fileBase64)
    {
        return $this->post('fileUpload', compact('fileBase64'));
    }
}