<?php

namespace Webimpacto\LaravelApp4Less\Channel;


class App4LessPushMessage
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $utm;


    /**
     * Set the notification title.
     *
     * @param  string $value
     * @return $this
     */
    public function title($value)
    {
        $this->title = $value;

        return $this;
    }

    /**
     * Set the notification URL.
     *
     * @param  string $value
     * @return $this
     */
    public function url($value)
    {
        $this->url = $value;

        return $this;
    }

    /**
     * Set the notification title.
     *
     * @param  string $value
     * @return $this
     */
    public function utm($value)
    {
        $this->utm = $value;

        return $this;
    }

    /**
     * Get an array representation of the message.
     *
     * @return array
     */
    public function toArray()
    {
        return collect([
            'title',
            'url',
            'utm',
        ])
            ->mapWithKeys(function ($option) {
                return [$option => $this->{$option}];
            })
            ->toArray();
    }
}

