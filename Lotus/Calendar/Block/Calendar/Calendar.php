<?php
namespace Lotus\Calendar\Block\Calendar;

use DateTime;
use Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class Calendar extends \Magento\Framework\View\Element\Template
{
    /**
     * @var TimezoneInterface
     */
    protected $timezoneInterface;

    /**
     * Calendar constructor.
     * @param Context $context
     * @param TimezoneInterface $timezoneInterface
     */
    public function __construct(
        Context $context,
        TimezoneInterface $timezoneInterface
    ) {
        $this->timezoneInterface = $timezoneInterface;
        parent::__construct($context);
    }

    /**
     *
     */
    public function getEvents()
    {
        $result = [];

        $result[] = [
            'name' => 'Event 1',
            'date' => '2020-07-25', // YYYY-mm-dd
            'startTime' => '15:00:00',
            'color' => '#2196f3',
            'type' => '1',
            'options' => [
                ['label' => 'Option 1', 'value' => 'Value 1'],
                ['label' => 'Option 2', 'value' => 'Value 2']
            ]
        ];

        $result[] = [
            'name' => 'Event 2',
            'date' => '2020-07-25', // YYYY-mm-dd
            'startTime' => '14:00:00',
            'color' => '#4caf50',
            'type' => '2',
            'options' => [
                ['label' => 'Option 1', 'value' => 'Value 1'],
                ['label' => 'Option 2', 'value' => 'Value 2'],
                ['label' => 'Option 3', 'value' => 'Value 3']
            ]
        ];

        return json_encode($result);
    }

    /**
     * Get current store time
     * 
     * @return string
     */
    public function getCurrentStoreTime()
    {
        return $this->timezoneInterface->date()->format('Y-m-d');
    }

    /**
     *
     */
    public function getTypes()
    {
        $result = [
            [ 'label' => 'All', 'value' => 0],
            [ 'label' => 'Type 1', 'value' => 1],
            [ 'label' => 'Type 2', 'value' => 2]
        ];

        return json_encode($result);
    }
}