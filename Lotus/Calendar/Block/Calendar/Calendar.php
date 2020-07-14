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

        $colors = $this->getColors();

        $type1 = 1;
        $type2 = 2;

        $option1 = [
            ['label' => 'Option 1', 'value' => 'Value 1'],
            ['label' => 'Option 2', 'value' => 'Value 2']
        ];
        $option2 = [
            ['label' => 'Option 1', 'value' => 'Value 1'],
            ['label' => 'Option 2', 'value' => 'Value 2'],
            ['label' => 'Option 3', 'value' => 'Value 3']
        ];

        $result[] = [
            'name' => 'Event 1',
            'date' => date_format(new DateTime(), 'Y-m-d'), // YYYY-mm-dd
            'startTime' => '15:00:00',
            'color' => $colors[$type1],
            'type' => $type1,
            'options' => $option1
        ];

        $result[] = [
            'name' => 'Event 2',
            'date' => date_format(new DateTime(), 'Y-m-d'), // YYYY-mm-dd
            'startTime' => '14:00:00',
            'color' => $colors[$type2],
            'type' => $type2,
            'options' => $option2
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
            ['label' => 'All', 'value' => 0, 'color' => '#ff9800'],
            ['label' => 'Type 1', 'value' => 1, 'color' => '#2196f3'],
            ['label' => 'Type 2', 'value' => 2, 'color' => '#4caf50']
        ];

        return $result;
    }

    /**
     *
     */
    public function getColors()
    {
        $result = [];

        $types = $this->getTypes();

        foreach($types as $type) {
            $key = $type['value'];
            $value = $type['color'];
            $result[$key] = $value;
        }

        return $result;
    }

    /**
     *
     */
    public function getCalendarHeight()
    {
        return 1000;
    }
}