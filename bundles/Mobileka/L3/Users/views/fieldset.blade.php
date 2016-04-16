<?php use Mobileka\L3\Engine\Form\Components\Checkbox; ?>

<style>
  .fs-label{
    margin-top: -30px;
    margin-left: 30px;
  }
</style>

<div id="row_enabled_fields_json" class="control-group">
  <label for="" class="control-label">{{ formLang('users::default', 'enabled_fields_json') }}</label>
  <div class="controls">
    <div id="field-set">

      @foreach ($fieldset->fields as $field)
        {{ Checkbox::make($field->name)->setValue($field->value)->render() }}
        <span class="fs-label pull-left">{{ $field->label }}</span>
      @endforeach

      {{ \Form::hidden('enabled_fields_json', $fieldset->user->enabled_fields_json, array('id' => 'enabled_fields_json')) }}

      <!-- <pre>{{ print_r($fieldset, false) }}</pre> -->
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#row_enabled_fields_json').on('click', 'ins', function(){
      var json = [];
      $('#row_enabled_fields_json .checkbox-value').each(function(){
        var value = $(this).val();
        var name = $(this).attr('name');
        if (value == 1){
          json.push(name);
        }
      });
      $('#enabled_fields_json').val(JSON.stringify(json));
    });
  });
</script>
