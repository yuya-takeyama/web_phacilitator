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
 * ServiceProvider for phpDataMapper.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_Provider_DataMapperProvider
    implements Sumile_ServiceProviderInterface
{
    public function register(Sumile_Application $app)
    {
        $app['dm']         = $app->share(array($this, 'provideDataMapperContainer'));
        $app['dm.adapter'] = $app->share(array($this, 'provideAdapter'));
    }

    public function boot(Sumile_Application $app)
    {
    }

    public function provideDataMapperContainer($c)
    {
        return new Yuyat_WebPhacilitator_DataMapperContainer($c['dm.adapter']);
    }

    public function provideAdapter($c)
    {
        return new phpDataMapper_Adapter_Mysql(
            $c['db.host'],
            $c['db.database'],
            $c['db.user'],
            $c['db.password']
        );
    }
}
