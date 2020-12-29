@extends('layouts.base')

@section('content')
    <div class="head">
        <h1 class="text-center fw-bold">Khảo sát dinh dưỡng</h1>
    </div>

    <div class="display-highcharts nutrition-management m30t">
        <form id="form-statistical-population" action="{{ route(USER_NUTRITION_INDEX) }}" method="GET">
            <div class="row m0 m30b">
                <div id="block-status" class="row spBlock m0l w-auto h-100">
                    <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 150px;">
                        <label class="m0 text-white fs16">Độ tuổi</label>
                    </div>
                    <div class="centered p0 bg-white m30r">
                        <select name="table_type" class="option-paginate-1 btn form-control hp100 p15lr fs16" style="min-width: 140px">
                            @foreach(TYPE_POPULATION_NAME as $key => $value)
                                <option value="{{ $key }}" @if(isset($params['table_type']) && $params['table_type'] == $key) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="centered first-block p15r p15l" style="background-color: #6e7a94; min-width: 150px;">
                        <label class="m0 text-white fs16">Đợt khảo sát</label>
                    </div>
                    <div class="centered p0 bg-white">
                        <select name="survey_id" class="option-paginate-1 btn form-control hp100 p15lr fs16" style="min-width: 140px">
                            <option value="" selected>Chọn đợt khảo sát</option>
                            @foreach($surveys as $value)
                                <option value="{{ $value['id'] }}" @if(isset($params['survey_id']) && $params['survey_id'] == $value['id']) selected @endif>{{ $value['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row m-0">
                <div class="offset-8 col-4 m30b">
                    <div class="row m0" style="justify-content: flex-end">
                        <div class="text-right">
                            <a href="/create" class="btn custom-btn-success">
                                Xuất file
                            </a>
                        </div>
                        <div class="text-right m10l">
                            <a href="{{ route(USER_NUTRITION_CREATE) }}" class="btn custom-btn-success">
                                Thêm bản ghi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row m0">
            <div class="col-12 bg-white" style="padding: 30px;">
                <div class="mb-3">
                    <button class="btn-delete-multi no-border btn-group-item border-0 fw500" style="background-color: transparent">
                        <i aria-hidden="true" class="fas fa-trash-alt fa-lg text-danger btn-action m10r"></i>Xoá nhiều
                    </button>
                </div>

                <div class="content-wrapper" style="background-color: white;">
                    <form id="delete-multi-record" method="post" action="{{ route(USER_NUTRITION_DESTROY_MULTI) }}">
                    @csrf
                        <input type="hidden" name="table_type" value="{{ $params['table_type'] ?? INFANTS }}">
                        <table class="table table-bordered table-striped border-0 m0">
                            <thead>
                            <tr>
                                <th class="text-center w-7dot2"><input type="checkbox" class="parent-checkbox" style="transform: scale(1.3)"></th>
                                <th class="text-center">Cân nặng <br>(kg)</th>
                                <th class="text-center">Chiều cao <br>(cm)</th>
                                @switch($tableType)
                                    @case(INFANTS)
                                    <th class="text-center">Vòng đầu <br>(cm)</th>
                                    @break
                                    @case(TODDLER)
                                    <th class="text-center">Vòng cánh tay <br>(cm)</th>
                                    <th class="text-center">Nếp gấp da ở cơ tam đầu <br>(cm)</th>
                                    @break
                                    @case(CHILDREN)
                                    <th class="text-center">Vòng cánh tay <br>(cm)</th>
                                    <th class="text-center">Vòng đầu <br>(cm)</th>
                                    <th class="text-center">Vòng ngực <br>(cm)</th>
                                    <th class="text-center">Nếp gấp da ở cơ tam đầu <br>(cm)</th>
                                    @break
                                    @case(TEENS)
                                    <th class="text-center">Nếp gấp da ở cơ tam đầu <br>(cm)</th>
                                    <th class="text-center">Phần trăm mỡ của cơ thể <br>(%)</th>
                                    @break
                                    @case(ADULTS)
                                    <th class="text-center">Vòng cánh tay <br>(cm)</th>
                                    <th class="text-center">Nếp gấp da ở cơ tam đầu <br>(cm)</th>
                                    <th class="text-center">Phần trăm mỡ của cơ thể <br>(%)</th>
                                    @break
                                    @case(SENIORS)
                                    <th class="text-center">Vòng cánh tay <br>(cm)</th>
                                    <th class="text-center">Nếp gấp da ở cơ tam đầu <br>(cm)</th>
                                    <th class="text-center">Chiều cao đầu gối <br>(cm)</th>
                                    <th class="text-center">Vòng bụng chân <br>(cm)</th>
                                    @break
                                @endswitch
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($data as $item)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" class="sub-checkbox" style="transform: scale(1.3)"
                                               name="ids[]" value="{{ $item['id'] }}">
                                    </td>
                                    <td>{{ $item['weight'] }}</td>
                                    <td>{{ $item['height'] }}</td>
                                    @switch($tableType)
                                        @case(INFANTS)
                                        <td class="text-center">{{ $item['head_circumference'] }}</td>
                                        @break
                                        @case(TODDLER)
                                        <td class="text-center">{{ $item['arm_circumference'] }}</td>
                                        <td class="text-center">{{ $item['biceps_skinfold'] }}</td>
                                        @break
                                        @case(CHILDREN)
                                        <td class="text-center">{{ $item['arm_circumference'] }}</td>
                                        <td class="text-center">{{ $item['head_circumference'] }}</td>
                                        <td class="text-center">{{ $item['chest_circumference'] }}</td>
                                        <td class="text-center">{{ $item['biceps_skinfold'] }}</td>
                                        @break
                                        @case(TEENS)
                                        <td class="text-center">{{ $item['biceps_skinfold'] }}</td>
                                        <td class="text-center">{{ $item['fat_percentage'] }}</td>
                                        @break
                                        @case(ADULTS)
                                        <td class="text-center">{{ $item['arm_circumference'] }}</td>
                                        <td class="text-center">{{ $item['biceps_skinfold'] }}</td>
                                        <td class="text-center">{{ $item['fat_percentage'] }}</td>
                                        @break
                                        @case(SENIORS)
                                        <td class="text-center">{{ $item['arm_circumference'] }}</td>
                                        <td class="text-center">{{ $item['biceps_skinfold'] }}</td>
                                        <td class="text-center">{{ $item['knee_height'] }}</td>
                                        <td class="text-center">{{ $item['stomach_feet'] }}</td>
                                        @break
                                    @endswitch
                                    <td class="text-center">
                                        <button type="button"
                                                class="delete-item btn btn-danger border-0 btn-topic-custom"
                                                data-toggle="modal" data-target="#modal-delete"
                                                data-id="{{ $item['id'] }}">
                                            <a class="text-white" data-toggle="tooltip" data-placement="top"
                                               title="Xoá">
                                                <i class="fa fa-trash-alt"></i>
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    @switch($tableType)
                                        @case(INFANTS)
                                        <td colspan="4" class="text-danger text-center">Không có dữ liệu</td>
                                        @break
                                        @case(TODDLER)
                                        <td colspan="5" class="text-danger text-center">Không có dữ liệu</td>
                                        @break
                                        @case(CHILDREN)
                                        <td colspan="7" class="text-danger text-center">Không có dữ liệu</td>
                                        @break
                                        @case(TEENS)
                                        <td colspan="5" class="text-danger text-center">Không có dữ liệu</td>
                                        @break
                                        @case(ADULTS)
                                        <td colspan="6" class="text-danger text-center">Không có dữ liệu</td>
                                        @break
                                        @case(SENIORS)
                                        <td colspan="7" class="text-danger text-center">Không có dữ liệu</td>
                                        @break
                                    @endswitch
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="group-end d-flex mt-3 justify-content-between">
            @if($data->total() > 0)
            <span>{{ $data->firstItem() }} ~ {{ $data->lastItem() }} / {{ $data->total() }} bản ghi</span>
            @endif
            {{ $data->appends([
                'table_type' => $params['table_type'] ?? '',
                'survey_id' => $params['survey_id'] ?? ''])
                ->links('partials.paginate', ['paginator' => $data]) }}
        </div>

        <div class="modal" id="modal-delete">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form id="form-delete-item" method="POST" class="form-data-submit w-100">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="table_type" value="{{ $params['table_type'] ?? INFANTS }}">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <input type="hidden" id="input-id-delete">
                            <h5 class="modal-title text-white">Xoá item</h5>
                        </div>
                        <div class="modal-body centered">
                            <p>Bạn muốn xoá bản ghi này?</p>
                        </div>
                        <div class="modal-footer centered">
                            <button type="button" class="btn btn-danger button-delete text-white w-25 mr-4" >Ok</button>
                            <button type="button" class="btn button-cancel-modal btn-success w-25" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/nutrition.js')}}"></script>
@endsection
