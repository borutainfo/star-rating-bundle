<?php

namespace Boruta\StarRatingBundle\Extensions;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class StarRatingExtension extends AbstractExtension
{
    protected Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function getFilters()
    {
        return array(
            new TwigFilter('rating', array($this, 'rating'), array('is_safe' => array('all'))),
        );
    }

    public function rating($number, $max = 5, $starSize = "", $inline = false)
    {
        $tag = 'div';
        if ($inline) {
            $tag = 'span';
        }
        return $this->twig->render(
            '@BorutaStarRatingBundle/Display/ratingDisplay.html.twig',
            array(
                'stars' => $number,
                'max' => $max,
                'starSize' => $starSize,
                'tag' => $tag,
            )
        );
    }

    public function getName()
    {
        return 'star_rating_extension';
    }
}