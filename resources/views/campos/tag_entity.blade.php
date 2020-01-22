@if ($showLabel && $showField)
<div {!! $options['wrapperAttrs'] !!}  >
@endif

    @if ($showLabel)
        {!! Form::label($name, $options['label'], $options['label_attr']) !!}
    @endif

    @if ($showLabel)
    @endif
    @if ($showField)
     <?php foreach ((array)$options['children'] as $child): ?>
        <?= $child->render($options['choice_options'], true, true, false) ?>
    <?php endforeach; ?>
    @endif

    @if ($showError && isset($errors))
        {!!$errors->first(array_get($options, 'real_name', $name), '<div '.$options['errorAttrs'].'>:message</div>')!!}
    @endif
    @if ($showLabel)
        @if(isset($options['help']))
        <span class="help-block">{!!$options['help']!!}</span>
        @endif
    @endif
@if ($showLabel && $showField)
</div>

       <script type="text/javascript">
            $(document).ready(function () {
//$options['choices']
                $('[name="{{$name}}"]').select2({
                 //   tags: [],
                    tokenSeparators: [','],
                    @if ( !empty($options['maximumInputLength']))
                    maximumInputLength: {{ $options['maximumInputLength'] }}
                    @endif
                });
            });
        </script>
@endif
