@if ($showLabel && $showField)
<div {!! $options['wrapperAttrs'] !!}  >
@endif

    @if ($showLabel)
    
        {!! Form::label($name, $options['label'], $options['label_attr']) !!}
    @endif

    @if ($showLabel)
    
    @endif
    @if ($showField)
     @if(isset($noEdit) and $noEdit === true)
         {!! (isset($options['choices']) and isset($options['choices'][$options['selected']]))?$options['choices'][$options['selected']]:'' !!}
     @else
          {!! Form::select($name, (array) $options['choices'], (array)$options['selected'], $options['attr'])!!}
     @endif
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

                var s2 = $('[name="{{$name}}"]').select2({
                    tags: true,
                    tokenSeparators: [','],
                    @if ( !empty($options['maximumInputLength']))
                    maximumInputLength: {{ $options['maximumInputLength'] }}
                    @endif
                });

                var vals = {!! json_encode($options['selected']) !!};

               if(vals){
                    vals.forEach(function(e){
                    if(!s2.find('option:contains(' + e + ')').length) 
                      s2.append($('<option>').text(e));
                    });
                    s2.val(vals).trigger("change"); 
                }


            });
        </script>
@endif
