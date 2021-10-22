<?php

namespace Modules\Backend\Providers\Components;

use Illuminate\Support\ServiceProvider;
use Collective\HtmlFormFacade as Form;

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
        Form::component('hText', 'forms.horizon.text', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);
        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hEmail', 'forms.horizon.email', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);



        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hSearch', 'forms.horizon.search', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hTel', 'forms.horizon.tel', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hNumber', 'forms.horizon.number', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hDate', 'forms.horizon.date', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hUrl', 'forms.horizon.url', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hFile', 'forms.horizon.file', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hTextarea', 'forms.horizon.textarea', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);



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
        Form::component('hSelect', 'forms.horizon.select', ['name', 'label', 'data', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

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
        Form::component('hSelectRange', 'forms.horizon.selectrange', ['name', 'label', 'begin', 'end', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


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
        Form::component('hSelectYear', 'forms.horizon.selectyear', ['name', 'label', 'begin', 'end', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


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
        Form::component('hSelectMonth', 'forms.horizon.selectmonth', ['name', 'label', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


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
        Form::component('hCheckbox', 'forms.horizon.checkbox', ['name', 'label', 'checked', 'required' => false,  'col_size' => 2, 'attributes' => []]);



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
        Form::component('hRadio', 'forms.horizon.radio', ['name', 'label', 'checked' => null, 'required' => false,  'col_size' => 2, 'attributes' => []]);
    }
}
