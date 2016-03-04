<?php

/*
 * (c) Jean-François Lépine <https://twitter.com/Halleck45>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hal\Application\Formater\Summary;
use Hal\Application\Formater\FormaterInterface;
use Hal\Application\Rule\Validator;
use Hal\Component\Bounds\BoundsInterface;
use Hal\Component\Result\ResultCollection;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Hal\Application\Score\Scoring;


/**
 * Formater for cli usage
 *
 * @author Jean-François Lépine <https://twitter.com/Halleck45>
 */
class Cli implements FormaterInterface {

    /**
     * Validator
     *
     * @var \Hal\Application\Rule\Validator
     */
    private $validator;

    /**
     * Bounds
     *
     * @var BoundsInterface
     */
    private $bound;

    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * Constructor
     *
     * @param Validator $validator
     * @param BoundsInterface $bound
     * @param OutputInterface $output
     */
    public function __construct(Validator $validator, BoundsInterface $bound, OutputInterface $output)
    {
        $this->bound = $bound;
        $this->validator = $validator;
        $this->output = $output;
    }

    /**
     * @inheritdoc
     */
    public function terminate(ResultCollection $collection, ResultCollection $groupedResults){

        $this->output->write(str_pad("\x0D", 80, "\x20"));
        $this->output->writeln('');

        // score
        $score = $collection->getScore();
//        if($score) {
            foreach ($score->all() as $name => $value) {
                $this->output->writeln(sprintf('%s %s', str_pad($name, 35, '.'),  str_pad($value, 5, ' ', STR_PAD_LEFT). ' / ' . Scoring::MAX));
            }
        $this->output->writeln('');
//        }

    }

    /**
     * @inheritdoc
     */
    public function getName() {
        return 'Summary CLI';
    }
}