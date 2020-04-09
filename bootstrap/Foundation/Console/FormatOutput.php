<?php

namespace Boot\Foundation\Console;

trait FormatOutput
{
    protected function info($content)
    {
        // green text
        $this->output->writeln("<info>$content</info>");
    }

    protected function comment($content)
    {
        // yellow text
        $this->output->writeln("<comment>$content</comment>");
    }

    protected function question($content)
    {
        // black text on a cyan background
        $this->output->writeln("<question>$content</question>");
    }

    protected function error($content)
    {
        // white text on a red background
        $this->output->writeln("<error>$content</error>");
    }
}
