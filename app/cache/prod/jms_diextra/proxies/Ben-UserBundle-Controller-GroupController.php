<?php

namespace EnhancedProxyc1729f3f_209c1471bd4965eeea62c412a9a107b728cb3fa9\__CG__\Ben\UserBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class GroupController extends \Ben\UserBundle\Controller\GroupController
{
    private $__CGInterception__loader;

    public function showAction($groupname)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\GroupController', 'showAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($groupname));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($groupname), $interceptors);

        return $invocation->proceed();
    }

    public function newAction()
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\GroupController', 'newAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function listAction()
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\GroupController', 'listAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function editAction($groupname)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\GroupController', 'editAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($groupname));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($groupname), $interceptors);

        return $invocation->proceed();
    }

    public function deleteAction($groupname)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\GroupController', 'deleteAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($groupname));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($groupname), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}