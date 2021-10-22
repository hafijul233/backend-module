<?php

namespace Modules\Backend\Providers\Components;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

/**
 * Class HorizontalFieldProvider
 * @package Modules\Backend\Providers\Components
 */
class HorizontalFieldProvider extends ServiceProvider
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

    public function boot()
    {
        //       Horizontal Form   start

        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hText', 'backend::forms.horizon.text', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);
        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hEmail', 'backend::forms.horizon.email', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);



        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hSearch', 'backend::forms.horizon.search', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hTel', 'backend::forms.horizon.tel', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hNumber', 'backend::forms.horizon.number', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hDate', 'backend::forms.horizon.date', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hUrl', 'backend::forms.horizon.url', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hFile', 'backend::forms.horizon.file', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hTextarea', 'backend::forms.horizon.textarea', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);



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
        Form::component('hSelect', 'backend::forms.horizon.select', ['name', 'label', 'data', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * Create a select range field.
         *
         * @param  string $name
         * @param  string $begin
         * @param  string $end
         * @param  string $selected
         * @param  array  $options
         *
         * @return \Illuminate\Support\HtmlString
         */
        Form::component('hSelectRange', 'backend::forms.horizon.selectrange', ['name', 'label', 'begin', 'end', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


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
        Form::component('hSelectYear', 'backend::forms.horizon.selectyear', ['name', 'label', 'begin', 'end', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


        /**
         * Create a select month field.
         *
         * @param  string $name
         * @param  string $selected
         * @param  array  $options
         * @param  string $format
         *
         * @return \Illuminate\Support\HtmlString
         */
        Form::component('hSelectMonth', 'backend::forms.horizon.selectmonth', ['name', 'label', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


        /**
         * Create a checkbox input field.
         *
         * @param  string $name
         * @param  mixed  $value
         * @param  bool   $checked
         * @param  array  $options
         *
         * @return \Illuminate\Support\HtmlString
         */
        Form::component('hCheckbox', 'backend::forms.horizon.checkbox', ['name', 'label', 'checked', 'required' => false,  'col_size' => 2, 'attributes' => []]);



        /**
         * Create a radio button input field.
         *
         * @param  string $name
         * @param  mixed  $value
         * @param  bool   $checked
         * @param  array  $options
         *
         * @return \Illuminate\Support\HtmlString
         */
        Form::component('hRadio', 'backend::forms.horizon.radio', ['name', 'label', 'checked' => null, 'required' => false,  'col_size' => 2, 'attributes' => []]);
    }
}
