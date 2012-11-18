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
 * Buffer output for Recipe execution.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_BufferOutput
    implements Yuyat_Phacilitator_OutputInterface
{
    private $buffer = '';

    public function write($str = '')
    {
        $this->buffer .= $str;
    }

    public function writeln($str = '')
    {
        $this->write($str . PHP_EOL);
    }

    public function writeError($str = '')
    {
        $this->write($str);
    }

    public function writelnError($str = '')
    {
        $this->writeln($str);
    }

    public function getBuffer()
    {
        return $this->buffer;
    }
}
