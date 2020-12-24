<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:19
 */ ?>
@section('titulo', ' - Editando SubMenu')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editando SubMenu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('itempaginas.update',[$itempagina->id]) }}" enctype="multipart/form-data">
                                @method('put')
                                {{ csrf_field() }}

                                @php $input = 'capa'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Imagem de Capa para o
                                        Item</label>
                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="file"
                                               class="col-md-10 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}">
                                        <small id="capaHelp" class="form-text text-muted">A imagem será redimemsionada para 600px X 600px.</small>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'pagina_id'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Pagina</label>
                                    <div class="col-md-12">
                                        <select name="{{ $input }}" id="{{ $input }}"
                                                class="col-md-10 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}">
                                            @foreach($paginas as $pag)
                                                <option value="{{ $pag->id }}" {{ ($itempagina->$input == $pag->id) ? 'selected' : '' }}>{{ $pag->nome }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'titulo'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Titulo da Item</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Titulo da Item Item"
                                               value="{{ isset($itempagina) ? $itempagina->$input : old($input) }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'texto'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Texto da Item</label>

                                    <div class="col-md-12">
                                        <textarea id="textoEdit" type="textarea"
                                                  class="ckeditor {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                  name="{{$input}}">{{ isset($itempagina) ? $itempagina->$input : old($input) }}</textarea>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Modificar o Item
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
            CKEDITOR.replace('textoEdit', {
                filebrowserUploadUrl: "{{route('ckeditor.uploaditemEdit', ['id'=>$itempagina->id,'_token' => csrf_token()])}}",
                filebrowserUploadMethod: 'form',
                toolbar: [
                    { name: 'document', items: [ 'Source' ] },
                    { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                    { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
                    { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl'] },
                    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                ],

            });

        </script>
    @endsection
</x-app-layout>

