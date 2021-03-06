<?php

namespace Modules\Backend\Providers\Components;

use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

class NormalFieldProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    /**
     * Load All Normal Bootstrap Style Forms
     *
     * Example:
     *
     * Label
     *  +-----------------------------------+
     *  |            Field                  |
     *  +-----------------------------------+
     */
    public function boot()
    {
        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nText', 'backend::forms.normal.text', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);
        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nEmail', 'backend::forms.normal.email', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nPassword', 'backend::forms.normal.password', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nRange', 'backend::forms.normal.range', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nSearch', 'backend::forms.normal.search', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nTel', 'backend::forms.normal.tel', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nNumber', 'backend::forms.normal.number', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nDate', 'backend::forms.normal.date', ['name', 'label', 'default' => date('Y-m-d'), 'required' => false, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nUrl', 'backend::forms.normal.url', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nFile', 'backend::forms.normal.file', ['name', 'label', 'default' => null, 'required' => false, 'preview' => [false, 100, '/img/logo-app.png'],'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nTextarea', 'backend::forms.normal.textarea', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);



        /**
         * Create a select box field.
         *
         * @param  string $name
         * @param  array  $list
         * @param  string|bool $selected
         * @param  array  $selectAttributes
         * @param  array  $optionsAttributes
         * @param  array  $optgroupsAttributes
         */
        Form::component('nSelect', 'backend::forms.normal.select', ['name', 'label', 'data', 'selected', 'required' => false, 'attributes' => []]);

        /**
         * Create a select range field.
         *
         * @param  string $name
         * @param  string $begin
         * @param  string $end
         * @param  string $selected
         * @param  array  $options
         *
         * @return HtmlString
         */
        Form::component('nSelectRange', 'backend::forms.normal.selectrange', ['name', 'label', 'begin', 'end', 'selected', 'required' => false, 'attributes' => []]);


        /**
         * Create a select year field.
         *
         * @param  string $name
         * @param  string $begin
         * @param  string $end
         * @param  string $selected
         * @param  array  $options
         *
         * @return mixed
         */
        Form::component('nSelectYear', 'backend::forms.normal.selectyear', ['name', 'label', 'begin', 'end', 'selected' => date('Y'), 'required' => false, 'attributes' => []]);


        /**
         * Create a select month field.
         *
         * @param  string $name
         * @param  string $selected
         * @param  array  $options
         * @param  string $format
         *
         * @return HtmlString
         */
        Form::component('nSelectMonth', 'backend::forms.normal.selectmonth', ['name', 'label', 'selected' => date('m'), 'required' => false, 'attributes' => []]);


        /**
         * Create a checkbox input field.
         *
         * @param  string $name
         * @param  mixed  $value
         * @param  bool   $checked
         * @param  array  $options
         *
         * @return HtmlString
         */
        Form::component('nCheckbox', 'backend::forms.normal.checkbox', ['name', 'label', 'default' => null, 'checked', 'required' => false, 'attributes' => []]);



        /**
         * Create a radio button input field.
         *
         * @param  string $name
         * @param  mixed  $value
         * @param  bool   $checked
         * @param  array  $options
         *
         * @return HtmlString
         */
        Form::component('nRadio', 'backend::forms.normal.radio', ['name', 'label', 'checked', 'required' => false, 'attributes' => []]);
    }
}
