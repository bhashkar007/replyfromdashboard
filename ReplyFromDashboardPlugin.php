<?php
/**
 * Reply from Dashboard plugin for Craft CMS
 *
 * A Plugin to add Reply Button in Entry Listing Table in Dashboard.
 *
 * @author    Bhashkar Yadav
 * @copyright Copyright (c) 2018 Bhashkar Yadav
 * @link      http://sidd3.com
 * @package   ReplyFromDashboard
 * @since     1.0.0
 */

namespace Craft;

class ReplyFromDashboardPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Reply from Dashboard');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('A Plugin to add Reply Button in Entry Listing Table in Dashboard.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/bhashkar007/replyfromdashboard/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/bhashkar007/replyfromdashboard/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Bhashkar Yadav';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://sidd3.com';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'emailField' => array(AttributeType::String, 'label' => 'Email Field', 'default' => 'email'),
        );
    }

    /**
     * @return mixed
     */
    public function getSettingsHtml()
    {
       return craft()->templates->render('replyfromdashboard/ReplyFromDashboard_Settings', array(
           'settings' => $this->getSettings()
       ));
    }

    public function defineAdditionalEntryTableAttributes()
    {
        return array(
            'reply' => "Reply",
        );
    }
    
    public function getEntryTableAttributeHtml(EntryModel $entry, $attribute)
    {   
        $pluginSettings = craft()->plugins->getPlugin('replyFromDashboard')->getSettings();
        $emailField = $pluginSettings->emailField;
        if ($attribute == 'reply' && isset($entry->$emailField))
        {
            return '<a class="btn" href="mailto:'.$entry->$emailField.'" target="_top">Reply</a>';
        }
    }


}