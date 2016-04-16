<?php use Mobileka\L3\Users\FieldSet; ?>
<?php use Mobileka\L3\Users\Models\Group; ?>

{{ Form::open_for_files($crud->actionUrl, $crud->method, $crud->attributes) }}
{{ Form::token() }}

<script>
	var reporters = {{ Group::reportersJson() }};
  $(document).ready(function(){
    $('#row_group_id .active-result').on('click', function(){
			var reporter = $(this).text();
			$('#row_enabled_fields_json').remove();
      if ($.inArray(reporter, reporters) >= 0){
				$.get('/admin/fieldset_form/' + reporter, function(data) {
					$('#row_group_id').after(data);
					icheck();
				});
			}
			else
			{
				$('#row_group_id').after('<input type="hidden" id="row_enabled_fields_json" name="enabled_fields_json" value="[]">');
			}
    });
  });
</script>

<div class="box box-bordered">
	@foreach ($components as $fieldName => $component)
		@if ($component->active and !$component->relevantActions or in_array(Controller::$route['action'], $component->relevantActions))
			<?php $component->row($crud->model); ?>

			@if ($fieldName == 'enabled_fields_json' && $component->row->group != null && $component->row->group->isReportUser)

				<?php $user = $component->row; ?>
				<?php $fieldset = new FieldSet($user) ?>
				{{ $fieldset->render() }}

			@else

				<div id="row_{{$fieldName}}" class="control-group">
					<label for="{{ $component->name }}" class="control-label">{{ formLang($crud->languageFile, $component->name) . $component->required() }}</label>
					<div class="controls {{ $component->parentClass ? : '' }}">
						@if ($component->localized)
							@foreach (langs() as $lang)
								<label>
									{{-- HTML::image('admin_assets/img/flags/' . $lang . '.png', $lang, array('class' => 'flag')) --}}
									{{ $lang }}&nbsp;
									{{ $this->validation($errors->get('localized: '.$component->name.'_'.$lang)) }}
									{{ $component->render($lang) }}
								</label>
							@endforeach
						@else
							{{ $this->validation($errors->get($component->name)) }}
							{{ $component->render() }}
						@endif
					</div>
				</div>

			@endif
		@endif
	@endforeach

	{{ Form::hidden('successUrl', $crud->successUrl) }}

	<div class="form-actions">

		@if ($crud->cancelUrl)
			{{ HTML::link($crud->cancelUrl, ___($crud->languageFile, 'cancel'), array('class' => 'btn')) }}
		@endif

		{{ Form::submit(___($crud->languageFile, 'save'), array('class' => 'btn btn-green')) }}


	</div> <!-- .form-actions -->

</div> <!-- .box.box-bordered -->

{{ Form::close() }}
