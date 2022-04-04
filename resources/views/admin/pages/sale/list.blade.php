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
                <th class="column-title">Chi tiết</th>
                
                <th class="column-title">Tên sản phẩm</th>
                <th class="column-title">Ngày bán</th>
                <th class="column-title">Số lượng</th>
                <th class="column-title">Giá bán</th>
                <th class="column-title">% CK</th>
                <th class="column-title">Thành tiền</th>
                <th class="column-title">Nhân viên KD</th>
                <th class="column-title">Trạng thái</th>
                <th class="column-title">Hành động</th>
             </tr>
          </thead>
          <tbody>
          

            @if (count($items) > 0)

                @foreach ($items as $key => $val)
                            @php
                                $index              = $key + 1;
                                $class              = ($index % 2 == 0) ? "even" : "odd";
                                $id                 = $val['id'];
                                $sochungtu          =  Hightlight::show($val['sochungtu'], $params['search'], 'sochungtu');
                                $product_id         =  Hightlight::show($val['product_id'], $params['search'], 'product_id');
                                $product_name       =  Hightlight::show($val['product_name'], $params['search'], 'product_name');
                                $tenkhach           =  Hightlight::show($val['tenkhach'], $params['search'], 'tenkhach');
                                $diachi             =  Hightlight::show($val['diachi'], $params['search'], 'diachi');
                                $sodienthoai        =  Hightlight::show($val['sodienthoai'], $params['search'], 'sodienthoai');
                                $ngayban            =  Hightlight::show($val['ngayban'], $params['search'], 'ngayban');
                                $soluong            =  Hightlight::show($val['soluong'], $params['search'], 'soluong');
                                $giaban             =  Hightlight::show($val['giaban'], $params['search'], 'giaban');
                                $ck                 =  Hightlight::show($val['ck'], $params['search'], 'ck');
                                $thanhtien          =  Hightlight::show($val['thanhtien'], $params['search'], 'thanhtien');
                                $nhanvienkd         =  Hightlight::show($val['nhanvienkd'], $params['search'], 'nhanvienkd');
                                $status          = Template::showItemStatus($controllerName, $id, $val['status']);
                                $listBtnAction   = Template::showButtonAction($controllerName, $id);


                                //$name            = Hightlight::show($val['name'], $params['search'], 'name');
                                //$description     = Hightlight::show($val['description'], $params['search'], 'description');
                                // $link            = Hightlight::show($val['link'], $params['search'], 'link');
                                // $thumb           = Template::showItemThumb($controllerName, $val['thumb'], $val['name']);
                                
                                // $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                                // $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                                

                                //echo '<pre style="color:red">';
                                //print_r($items);
                                //echo '</pre>'; die();
                                
                            @endphp

                                <tr class="{{ $class }} pointer">
                                    <td>{{$index}}</td>
                                    <td width="20%">
                                    <p><strong>Số chứng từ:</strong> {!! $sochungtu !!}</p>
                                    <p><strong>Mã sản phẩm:</strong> {!! $product_id !!}</p>
                                    <p><strong>Tên khách hàng:</strong> {!! $tenkhach !!}</p>
                                    <p><strong>Địa chỉ:</strong> {!! $diachi !!}</p>
                                    <p><strong>Số điện thoại:</strong> {!! $sodienthoai !!}</p>
                                    </td>
                                    <td>{!! $product_name !!}</td>
                                    <td>{!! $ngayban !!}</td>
                                    <td>{!! $soluong !!}</td>
                                    <td>{!! $giaban !!}</td>
                                    <td>{!! $ck !!}</td>
                                    <td>{!! $thanhtien !!}</td>
                                    <td>{!! $nhanvienkd !!}</td>


                                    <td>{!! $status !!}</td>
                                    <td class="last">{!! $listBtnAction !!}</td>
                                </tr>  
                @endforeach
                  
            @else

                @include('admin.templates.list_empty', ['colspan' => 11])

            @endif   
            

        </tbody>
       </table>
    </div>
 </div>
