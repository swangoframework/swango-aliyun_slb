<?php
namespace Swango\Aliyun\Slb\Action\VServerGroup\Listener;
use Swango\Aliyun\Slb\Action\BaseAction;
use Swango\Aliyun\Slb\LocalHTTPListener;
use Swango\Aliyun\Slb\LocalVServerGroup;
class CreateLoadBalancerHTTPListener extends BaseAction {
    public function __construct() {
        parent::__construct();
        $this->request->setQueryParameter('LoadBalancerId', $this->config['balancer_id']);
        $this->request->setQueryParameter('HealthCheck', 'off');
        $this->request->setQueryParameter('ListenerPort', LocalHTTPListener::BALANCER_LISTENER_PORT);
        $this->request->setQueryParameter('StickySession', 'off');
        $this->request->setQueryParameter('VServerGroupId', LocalVServerGroup::getGroupId()); // this is not important
    }
}