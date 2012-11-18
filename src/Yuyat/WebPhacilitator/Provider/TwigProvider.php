<?php
/**
 * This file is part of WebPhacilitator.
 *
 * (c) Yuya Takeyama
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Yuyat_WebPhacilitator_Provider_TwigProvider
    implements Sumile_ServiceProviderInterface
{
    public function register(Sumile_Application $app)
    {
        $app['twig'] = $app->share(array($this, 'provideTwig'));
    }

    public function boot(Sumile_Application $app)
    {
    }

    public function provideTwig($c)
    {
        $loader = new Twig_Loader_Filesystem($c['dir.views']);

        $options = array(
            'charset'          => 'UTF-8',
            'debug'            => true,
            'strict_variables' => true,
        );

        return new Twig_Environment($loader, $options);
    }
}
