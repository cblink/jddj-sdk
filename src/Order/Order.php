<?php

namespace Cblink\Jddj\Order;

use Cblink\Jddj\Client;

/**
 * Class Order
 * @package Cblink\Jddj\Order
 *
 * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169
 */
class Order extends Client
{
    /**
     * 订单列表查询接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=ba3027848c3c4fda9674966e2a466482
     */
    public function getList($data = [])
    {
        return $this->post('order/es/query', $data);
    }

    /**
     * 商家确认接单接口
     *
     * @param string $orderId
     * @param string $operator
     * @param bool $isAgreed
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=c1a15129d1374e9da7fa35487f878604
     */
    public function confirm(string $orderId, $operator = '', $isAgreed = true)
    {
        return $this->post('orderAcceptOperate', compact('orderId', 'isAgreed', 'operator'));
    }

    /**
     * 订单已打印接口
     *
     * @param string $orderId
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=53f38f865dae4e9aa5105f7558e622bf
     */
    public function printed(string $orderId)
    {
        return $this->post('bm/open/api/order/printOrder', compact('orderId'));
    }

    /**
     * 订单取消且退款接口
     *
     * @param string $orderId
     * @param string $operRemark
     * @param string $operPin
     * @param null $operTime
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=6be3f3a811f14f22a83007ab02f23b03
     */
    public function cancelAndRefund(string $orderId, $operRemark = '', $operPin = '', $operTime = null)
    {
        return $this->post('orderStatus/cancelAndRefund', [
            'orderId' => $orderId,
            'operPin' => $operPin,
            'operRemark' => $operRemark,
            'operTime' => $operTime ?? date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * 商家审核用户取消申请接口
     *
     * @param string $orderId
     * @param bool $isAgreed
     * @param string $remark
     * @param string $operator
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=906b430307764a3ca3698c05c72f33d0
     */
    public function auditCancel(string $orderId, $isAgreed = true, $remark = '', $operator = '')
    {
        return $this->post('ocs/orderCancelOperate', [
            'orderId' => $orderId,
            '$isAgreed' => $isAgreed,
            '$remark' => $remark,
            '$operator' => $operator,
        ]);
    }

    /**
     * 订单调整接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=a7378109fd7243eea9efbb6231a7401c
     */
    public function adjust(array $data)
    {
        return $this->post('orderAdjust/adjustOrder', $data);
    }

    /**
     * 拣货完成且众包配送接口
     *
     * @param string $orderId
     * @param string $operator
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=ed93745b86c6487eaaea5f55a84785ac
     */
    public function jdzbDelivery(string $orderId, $operator = '')
    {
        return $this->post('bm/open/api/order/OrderJDZBDelivery', compact('orderId', 'operator'));
    }

    /**
     * 拣货完成且达达同城配送接口
     *
     * @param string $orderId
     * @param string $operator
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=737f0cabfc094967b2cb881a78cce68b
     */
    public function ddtcDelivery(string $orderId, $operator = '')
    {
        return $this->post('bm/open/api/order/OrderDDTCDelivery', compact('orderId', 'operator'));
    }

    /**
     * 拣货完成且商家自送接口
     *
     * @param string $orderId
     * @param string $operator
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=0e08e71a45dc48b6a337e06a852ac33a
     */
    public function serllerDelivery(string $orderId, $operator = '')
    {
        return $this->post('bm/open/api/order/OrderSerllerDelivery', compact('orderId', 'operator'));
    }

    /**
     * 拣货完成且顾客自提接口
     *
     * @param string $orderId
     * @param string $operator
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=4c0133c8cb264ee5b3f66f2881363cd6
     */
    public function selfMention(string $orderId, $operator = '')
    {
        return $this->post('bm/open/api/order/OrderSelfMention', compact('orderId', 'operator'));
    }

    /**
     * 订单达达配送转商家自送接口
     *
     * @param string $orderId
     * @param string $updatePin
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=e7b4950164754eecac7ea87278c2b071
     */
    public function modifySellerDelivery(string $orderId, $updatePin = '')
    {
        return $this->post('order/modifySellerDelivery', compact('orderId', 'updatePin'));
    }

    /**
     * 商家审核配送员取货失败接口
     *
     * @param string $orderId
     * @param bool $isAgreed
     * @param string $operator
     * @param string $remark
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=d10c63a2ea734b818b23f0bc1c8efe6f
     */
    public function receiveFailedAudit(string $orderId, $isAgreed = true, $operator = '', $remark = '')
    {
        return $this->post('order/receiveFailedAudit', compact('orderId', 'isAgreed', 'operator', 'remark'));
    }

    /**
     * 订单妥投接口
     *
     * @param string $orderId
     * @param string $operPin
     * @param string $operTime
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=ecc80f06d35141979f4841f345001f74
     */
    public function deliveryEndOrder(string $orderId, $operPin = '', $operTime = null)
    {
        return $this->post('ocs/deliveryEndOrder', [
            'orderId' => $orderId,
            'operPin' => $operPin,
            'operTime' => $operTime ?? date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * 根据订单号查询订单跟踪接口
     *
     * @param string $orderNo
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=d9d4fd73fba14fd8851a4c054d2ee42e
     */
    public function getByOrderNoForOaos(string $orderNo)
    {
        return $this->post('orderTrace/getByOrderNoForOaos', compact('orderNo'));
    }

    /**
     * 新版根据订单号查询订单跟踪接口
     *
     * @param string $orderId
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=6450cd91dd5b4dc0bb6a6cd17af6d0a4
     */
    public function getByOrderNoForOaosNew(string $orderId)
    {
        return $this->post('orderTrace/getByOrderNoForOaosNew', compact('orderId'));
    }

    /**
     * 商家确认收到拒收退回（或取消）的商品接口
     *
     * @param string $orderId
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=21a55807c096410c9cac9b71e110fa43
     */
    public function confirmReceiveGoods(string $orderId, $operTime = null)
    {
        return $this->post('order/confirmReceiveGoods', [
            'orderId' => $orderId,
            'operTime' => $operTime ?? date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * 催配送员抢单接口
     *
     * @param string $orderId
     * @param string $updatePin
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=96383a8274bd463a95dfc8b8d74220d1
     */
    public function urgeDispatching(string $orderId, $updatePin = '')
    {
        return $this->post('bm/urgeDispatching', [
            'orderId' => $orderId,
            'updatePin' => $updatePin,
        ]);
    }

    /**
     * 订单商家加小费接口
     *
     * @param string $orderId
     * @param int $tips 小费金额,单位分
     * @param string $operator
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=ed9e3ca7325c4d4d8ceaf959ed0e7a62
     */
    public function addTips(string $orderId, int $tips, $operator = '')
    {
        return $this->post('order/addTips', [
            'orderId' => $orderId,
            'tips' => $tips,
            'operator' => $operator,
        ]);
    }

    /**
     * 订单应结金额接口
     *
     * @param string $orderId
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=17f0b596df554fe2b66fa7742a025d92
     */
    public function shoudSettlementService(string $orderId)
    {
        return $this->post('bill/orderShoudSettlementService', compact('orderId'));
    }

    /**
     * 订单自提码核验接口
     *
     * @param string $selfPickCode
     * @param string $orderId
     * @param string $operPin
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=428fa2cb66784b64a85db36ec2972ff9
     */
    public function checkSelfPickCode(string $selfPickCode, string $orderId, $operPin = '')
    {
        return $this->post('ocs/checkSelfPickCode', compact('selfPickCode', 'orderId', 'operPin'));
    }

    /**
     * 商家处理配送员取货异常上报接口
     *
     * @param string $orderId
     * @param string $imgs 上传的图片url列表（多个图片，用英文逗号分隔）
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=daf7890afb634794a287428373a121e6
     */
    public function handleReport(string $orderId, $imgs = '')
    {
        return $this->post('order/handleReport', compact('orderId', 'imgs'));
    }

    /**
     * 根据订单号查看配送员取货异常上报订单处理详情接口
     *
     * @param string $orderId
     * @param string $source
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=7adbf72d68ed4a668f354db0e30fcfa8
     */
    public function getHandleReportRecord(string $orderId, $source = '')
    {
        return $this->post('order/getHandleReportRecord', compact('orderId', 'source'));
    }

    /**
     * 根据订单号查询用药人信息接口
     *
     * @param string $orderId
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=7adbf72d68ed4a668f354db0e30fcfa8
     */
    public function getOrderPrescriptionInfo(string $orderId)
    {
        return $this->post('order/es/getOrderPrescriptionInfo', compact('orderId'));
    }

    /**
     * 订单处方药审核结果接口
     *
     * @param array $data
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=17fb6b8c6d1e4165a182c06b4f2ddac2
     */
    public function internetHospitalAudit(array $data)
    {
        return $this->post('ocs/internetHospitalAudit', $data);
    }

    /**
     * 商家投诉达达配送员
     *
     * @param string $orderId
     * @param int $reasonId
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=200ade433c834b14994c7151468276d2
     */
    public function complaintDadaDeliverForPlatForm(string $orderId, int $reasonId)
    {
        return $this->post('bm/open/api/order/complaintDadaDeliverForPlatForm', compact('orderId', 'reasonId'));
    }

    /**
     * 虚拟订单审核接口
     *
     * @param string $orderId
     * @param bool $agree
     * @param string $operator
     * @param string $remark
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=8ccfe064380e4bbea25887adedaf2650
     */
    public function virtualOrderAudit(string $orderId, $agree = true, $operator = '', $remark = '')
    {
        return $this->post('ocs/virtualOrderAudit', compact('orderId', 'agree', 'operator', 'remark'));
    }

    /**
     * 绑定第三方运单号接口
     *
     * @param string $orderId
     * @param string $deliveryBillNo
     * @param int $thirdDeliveryCompany
     * @return mixed
     *
     * @see https://openo2o.jddj.com/staticnew/widgets/resources.html?groupid=169&apiid=4bbf6ad4d05d4fd89622cea515242aae
     */
    public function bandThirdDeliverNoApiPlatform(string $orderId, string $deliveryBillNo, int $thirdDeliveryCompany)
    {
        return $this->post('ocs/bandThirdDeliverNoApiPlatform', compact('orderId', 'deliveryBillNo', 'thirdDeliveryCompany'));
    }

}