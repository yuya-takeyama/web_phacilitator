<?php
/**
 * This file is part of WebPhacilitator.
 *
 * (c) Yuya Takeyama
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * ServiceProvider for Session.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_Provider_SessionProvider
    implements Sumile_ServiceProviderInterface
{
    public function register(Sumile_Application $app)
    {
        $app['session'] = $app->share(array($this, 'provideSession'));
    }

    public function boot(Sumile_Application $app)
    {
    }

    public function provideSession($c)
    {
        return new Yuyat_WebPhacilitator_Session(array(
            'data_mapper_container' => $c['dm'],
        ));
    }
}
