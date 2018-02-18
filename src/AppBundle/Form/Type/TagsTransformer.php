<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use AppBundle\Entity\Tag;

class TagsTransformer implements DataTransformerInterface
{
    public function transform($value)
    {
        // TODO: Implement transform() method.
        //dump($value);
        //return "hello world";
        return implode(', ',$value);
    }

    public function reverseTransform($value)
    {
        // TODO: Implement reverseTransform() method.
        $tagname=explode(',',$value);

        $tags=[];

        foreach ($tagname as $name)
        {
            $tag=new Tag();
            $tag->setName($name);
            $tags[]=$tag;
        }

        return $tags;
    }

}