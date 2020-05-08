<?php

namespace Cblink\Jddj\Shop;

use Cblink\Jddj\Client;

/**
 * Class Shop
 * @package Cblink\Jddj\Shop
 *
 * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=138426aa19b54c48ae8464af1ca3b681
 */
class Shop extends Client
{
    /**
     * 获取到家门店编码列表接口
     *
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=138426aa19b54c48ae8464af1ca3b681
     */
    public function getStationsByVenderId()
    {
        return $this->post('store/getStationsByVenderId');
    }

    /**
     * 新增不带资质的门店信息接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=93acef27c3aa4d8286d5c8c26b493629
     */
    public function createStore(array $data)
    {
        return $this->post('store/createStore', $data);
    }

    /**
     * 修改门店基础信息接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=2600369a456446f0921e918f3d15e96a
     */
    public function updateStoreInfo4Open(array $data)
    {
        return $this->post('store/updateStoreInfo4Open', $data);
    }

    /**
     * 根据到家门店编码查询门店基本信息接口
     *
     * @param string $StoreNo
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=2600369a456446f0921e918f3d15e96a
     */
    public function getStoreInfoByStationNo(string $StoreNo)
    {
        return $this->post('storeapi/getStoreInfoByStationNo', compact('StoreNo'));
    }

    /**
     * 根据订单号查询商家门店评价信息接口
     *
     * @param string $orderId
     * @param string $storeId
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=bd23397725bb4e74b69e2f2fa1c88d43
     */
    public function getCommentByOrderId(string $orderId, $storeId = '')
    {
        return $this->post('commentOutApi/getCommentByOrderId', compact('orderId', 'storeId'));
    }

    /**
     * 商家门店评价信息回复接口
     *
     * @param string $orderId
     * @param string $storeId
     * @param string $content
     * @param string $replyPin
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=ea0b466a7fa8489b813e8b197efca2d4
     */
    public function orgReplyComment(string $orderId, string $storeId, string $content, $replyPin = '')
    {
        return $this->post('commentOutApi/orgReplyComment', compact('orderId', 'storeId', 'content', 'replyPin'));
    }

    /**
     * 获取到家所有城市信息列表接口
     *
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=48c7416a02714b4ea7762fad3496ce56
     */
    public function allcities()
    {
        return $this->post('address/allcities');
    }

    /**
     * 获取商家服务城市列表接口
     *
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=6a1cfc654908417db2cdefbaaad58108
     */
    public function queryVenderServiceArea()
    {
        return $this->post('venderApiService/queryVenderServiceArea');
    }

    /**
     * 根据城市编码查询区域信息列表接口
     *
     * @param string $pin
     * @param string $areaCode
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=cc2a3b5d49e84f3eb41ee39a0afe33c3
     */
    public function getNextLevelByType(string $pin, string $areaCode)
    {
        return $this->post('address/getNextLevelByType', compact('pin', 'areaCode'));
    }

    /**
     * 根据门店编码修改运费起送价、满免以及商家自送运费接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=997977a13c62449ba15f3db3b4aec932
     */
    public function updateStoreFreightConfig(array $data)
    {
        return $this->post('freight/updateStoreFreightConfig', $data);
    }

    /**
     * 修改门店运费起送价及满免接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=bb6d4e5ad27b419993b6879a9bcd8efb
     */
    public function updateStoreFreightConfigNew(array $data)
    {
        return $this->post('freight/updateStoreFreightConfigNew', $data);
    }

    /**
     * 获取门店配送范围接口
     *
     * @param string $stationNo
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=8f6d0ac75d734c68bf5bd2a09f376a78
     */
    public function getDeliveryRangeByStationNo(string $stationNo)
    {
        return $this->post('store/getDeliveryRangeByStationNo', compact('stationNo'));
    }

    /**
     * 根据到家门店编码修改商家自动接单接口
     *
     * @param string $stationNo
     * @param int $isAutoOrder
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=5df446bb5ff14413965b8d702718dc48
     */
    public function updateStoreConfig4Open(string $stationNo, $isAutoOrder = 1)
    {
        return $this->post('store/updateStoreConfig4Open', compact('stationNo', 'isAutoOrder'));
    }

    /**
     * 查询商家中心账号信息接口
     *
     * @param int $pageNo
     * @param int $pageSize
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=67a5cd92e9704612b77064401a696144
     */
    public function searchUser($pageNo = 1, $pageSize = 10)
    {
        return $this->post('privilege/searchUser', compact('pageNo', 'pageSize'));
    }

    /**
     * 修改商家中心账号状态接口
     *
     * @param int $id
     * @param int $status
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=577224e9eac046cdaa3928d0487d51bd
     */
    public function updateUser(int $id, int $status)
    {
        return $this->post('privilege/updateUser', compact('id', 'status'));
    }

    /**
     * 初始化商家会员信息接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=865465fba05241519dbc089e09582914
     */
    public function initMerchantMemberInfo(array $data)
    {
        return $this->post('member/initMerchantMemberInfo', $data);
    }

    /**
     * 更新商家会员信息接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=5db45d085ee84a7496c871d742bac56e
     */
    public function updateMerchantMemberInfo(array $data)
    {
        return $this->post('member/updateMerchantMemberInfo', $data);
    }

    /**
     * 根据用户手机号批量获取到家会员身份标识（openId）接口
     *
     * @param string $phoneNumbers
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=715df5fda67544288c596307cd67c158
     */
    public function getMemberInfo(string $phoneNumbers)
    {
        return $this->post('member/getMemberInfo', compact('phoneNumbers'));
    }

    /**
     * 更新已绑定到家的商家会员卡信息接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=7fdf6a8a64b14126a84b184818525599
     */
    public function updateCardInfo(array $data)
    {
        return $this->post('member/updateCardInfo', $data);
    }

    /**
     * 商家会员制卡成功接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=b89506d8fb13401dafdd155adfcad200
     */
    public function createCardInfo(array $data)
    {
        return $this->post('member/createCardInfo', $data);
    }

    /**
     * 商家会员续费成功接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=350ee4cd19244cf7b74d503a1683e70b
     */
    public function renewCardInfo(array $data)
    {
        return $this->post('member/renewCardInfo', $data);
    }

    /**
     * 查询到家注册的商家会员注册信息接口
     *
     * @param string $orderId
     * @param string $uuid
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=59dae7634dd34c8fab4a57e9a803f3b0
     */
    public function getCommonMemberRegisteredInfo(string $orderId, $uuid = '')
    {
        return $this->post('member/getCommonMemberRegisteredInfo', compact('orderId', 'uuid'));
    }

    /**
     * 批量同步商家会员信息接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=346103af6775457ab50473f530aec9ab
     */
    public function synchronousMerchantMemberInfo(array $data)
    {
        return $this->post('member/synchronousMerchantMemberInfo', $data);
    }

    /**
     * 商家发送POS机器信息接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=64a9b0868a234e33ab6a6570b5188afa
     */
    public function putPosOrderSubmitInfo(array $data)
    {
        return $this->post('member/putPosOrderSubmitInfo', $data);
    }

    /**
     * 批量同步商家会员信息接口
     *
     * @param string $uniqueNo
     * @param bool $flag
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=194&apiid=346103af6775457ab50473f530aec9ab
     */
    public function exchangeCallback(string $uniqueNo, bool $flag)
    {
        return $this->post('vipPoints/exchangeCallback', compact('uniqueNo', 'flag'));
    }
}