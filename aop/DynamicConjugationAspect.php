<?php


use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Around;

class DynamicConjugationAspect implements Aspect
{
    /**
     * @Around("dynamic(public MyApp->method1(*))")
     */
    public function simplePointcut(MethodInvocation $invocation)
    {
        $invocation->getThis()->aspectMarker = true;
        return $invocation->proceed();
    }

    /**
     * @Around("dynamic(public MyApp->someMethod(*)) || dynamic(public MyApp->anotherMethod(*))")
     */
    public function combinedPointcut(MethodInvocation $invocation)
    {
        $invocation->getThis()->aspectMarker = true;
        return $invocation->proceed();
    }
}