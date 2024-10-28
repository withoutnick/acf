<?php

namespace Corcel\Acf\Field;

use Corcel\Acf\FieldInterface;
use Corcel\Model\Post;
use Corcel\Concerns\Shortcodes;

/**
 * Class Text.
 *
 * @author Junior Grossi <juniorgro@gmail.com>
 */
class Text extends BasicField implements FieldInterface
{

    use Shortcodes;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $field
     */
    public function process($field)
    {   
        $value = $this->fetchValue($field);

        if (is_array($value)) {
            $this->value = $value;
            return;
        }

        $this->value = $this->post->stripShortcodes($this->fetchValue($field)); 
    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->value;
    }
}
