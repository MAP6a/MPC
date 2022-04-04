@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formInputAttrReadonly = config('zvn.template.form_input_readonly');
    $formLabelAttr = config('zvn.template.form_label');

    $statusValue      = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $isEdit = @$item['id'] ? true : false;
    $inputHiddenID    = Form::hidden('id', @$item['id']);
    $inputHiddenThumb = Form::hidden('thumb_current', @$item['thumb']);
    
    $elements = [
        [
            'label'   => Form::label('sochungtu', 'Số chứng từ', $formLabelAttr),
            'element' => Form::text('sochungtu', @$item['sochungtu'], $formInputAttr )
        ],[
            'label'   => Form::label('ngayban', 'Ngày bán hàng', $formLabelAttr),
            'element' => Form::date('ngayban', @$item['ngayban'], $formInputAttr)
        ],[
            'label'   => Form::label('product_id', 'Sản Phẩm', $formLabelAttr),
            'element' => Form::select('product_id', $itemsProduct, @$item['product_id'], $formInputAttr)
        ],
        
        [
            'label'   => Form::label('soluong', 'Số lượng', $formLabelAttr),
            'element' => Form::text('soluong', @$item['soluong'],  $formInputAttr )
        ],[
            'label'   => Form::label('giaban', 'Giá bán', $formLabelAttr),
            'element' => Form::text('giaban', @$item['giaban'],  $formInputAttr )
        ],[ 
            'label'   => Form::label('ck', '% Chiết khấu', $formLabelAttr),
            'element' => Form::text('ck', @$item['ck'],  $formInputAttr )
        ],[ 
            'label'   => Form::label('thanhtien', 'Thành Tiền', $formLabelAttr),
            'element' => Form::text('thanhtien', @$item['thanhtien'],  $formInputAttr )
        ],[ 
            'label'   => Form::label('tenkhach', 'Tên khách', $formLabelAttr),
            'element' => Form::text('tenkhach', @$item['tenkhach'],  $formInputAttr )
        ],[ 
            'label'   => Form::label('diachi', 'Địa chỉ', $formLabelAttr),
            'element' => Form::text('diachi', @$item['diachi'],  $formInputAttr )
        ],[
            'label'   => Form::label('sodienthoai', 'Số điện thoại', $formLabelAttr),
            'element' => Form::text('sodienthoai', @$item['sodienthoai'],  $formInputAttr )
        ],[
            'label'   => Form::label('nhanvienkd', 'Nhân viên KD', $formLabelAttr),
            'element' => Form::text('nhanvienkd', @$item['nhanvienkd'],  $formInputAttr )
        ],[
            
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, @$item['status'], $formInputAttr)
        ],[
           
            'element' => $inputHiddenID . $inputHiddenThumb . Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
    
@endphp

@section('content')
@include('admin.templates.page_header', ['pageIndex'=> false])
@include ('admin.templates.error')

<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Form'])
                <div class="x_content">
                    {{ Form::open([
                        'method'         => 'POST', 
                        'url'            => route("$controllerName/save"),
                        'accept-charset' => 'UTF-8',
                        'enctype'        => 'multipart/form-data',
                        'class'          => 'form-horizontal form-label-left',
                        'id'             => 'main-form' ])  }}
                        {{--  <h3 style="color:red">He he</h3>  --}}
                        {!! FormTemplate::show($elements)  !!}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


@endsection
