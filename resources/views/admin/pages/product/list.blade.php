@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
@endphp


<div class="x_content">
    <div class="table-responsive">
       <table class="table table-striped jambo_table bulk_action">
          <thead>
             <tr class="headings">
                <th class="column-title">#</th>
                <th class="column-title">Tên sản phẩm</th>
                
                <th class="column-title">Loại sản phẩm</th>
                
                <th class="column-title">Số lượng</th>  
                <th class="column-title">Giá nhập</th>  
                <th class="column-title">Giá bán</th> 

                <th class="column-title">Chỉnh sửa</th>


                <th class="column-title">Trạng thái</th>
                <th class="column-title">Hành động</th>
             </tr>
          </thead>
          <tbody>
          

            @if (count($items) > 0)

                @foreach ($items as $key => $val)
                            @php
                                $index           = $key + 1;
                                $class           = ($index % 2 == 0) ? "even" : "odd";
                                $id              = $val['id'];
                                $name            = Hightlight::show($val['name'], $params['search'], 'name');
                                $content         = Hightlight::show($val['content'], $params['search'], 'content');
                                $soluong         = Hightlight::show($val['soluong'], $params['search'], 'soluong');
                                $gianhap         = Hightlight::show($val['gianhap'], $params['search'], 'gianhap');
                                $giaban          = Hightlight::show($val['giaban'], $params['search'], 'giaban');
                                //$link            = Hightlight::show($val['link'], $params['search'], 'link');
                                $thumb           = Template::showItemThumb($controllerName, $val['thumb'], $val['name']);
                                $categoryName    = $val['category_name'];
                                $status          = Template::showItemStatus($controllerName, $id, $val['status']);
                                $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                                $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                                $listBtnAction   = Template::showButtonAction($controllerName, $id);
                                
                            @endphp

                                <tr class="{{ $class }} pointer">
                                    <td>{{$index}}</td>
                                    <td width="40%">
                                    <p><strong>Name:</strong> {!! $name !!}</p>
                                    <p><strong>Description:</strong> {!! $content !!}</p>
                                    
                                    <p>{!! $thumb !!}</p>
                                    </td>
                                    
                                    <td >{!! $categoryName !!}</td>

                                    <td >{!! $soluong !!}</td>
                                    <td >{!! $gianhap !!}</td>
                                    <td >{!! $giaban !!}</td>
                                    
                                    <td>{!! $modifiedHistory !!}</td>
                                    <td>{!! $status !!}</td>
                                    <td class="last">{!! $listBtnAction !!}</td>
                                </tr>  
                @endforeach
                  
            @else

                @include('admin.templates.list_empty', ['colspan' => 6])

            @endif   

        </tbody>
       </table>
    </div>
 </div>
