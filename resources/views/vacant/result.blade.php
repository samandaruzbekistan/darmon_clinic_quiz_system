@extends('vacant.header')

@section('section')
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="fal fa-chart-bar"></i>
            <span class="text">Natijalar</span>
            @if($success == 1)
                <h6 class="okey" style="color: #00af2a">Topshirildi</h6>
            @else
                <h6 class="okey">Topshirilmadi</h6>
            @endif
        </div>
        <hr>
        <section class="big_chart">
            <div class="chart_circul">
                <h3 class="circul_title">4 ta fan bo'yicha umumiy natijaviylik</h3>
                <div class="contynr">
                    <div class="progress-circular">
                        <style>
                            .progress-circular {
                                background: conic-gradient(#469aff {{ $total*9 }}deg, #FFF 0deg);
                            }
                        </style>
                        <span class="span_value">{{ $prosent }}%</span>
                    </div>
                </div>
            </div>
            <div class="chart_reyting">
                <h3 class="circul_title chart_lorem">Har bir fan bo'yicha natijalar</h3>
                <div class="bax_chart">
                    <ul class="chart_numbers">
                        <li><span>100%</span></li>
                        <li><span>75%</span></li>
                        <li><span>50%</span></li>
                        <li><span>25%</span></li>
                        <li><span>0%</span></li>
                    </ul>
                    <ul class="bars">
                        <li><div class="bar" data-percentage="{{ $sb1*10 }}"></div><span>{{ $subjects[0]->name }}</span></li>
                        <li><div class="bar" data-percentage="{{ $sb2*10 }}"></div><span>{{ $subjects[1]->name }}</span></li>
                        <li><div class="bar" data-percentage="{{ $sb3*10 }}"></div><span>{{ $subjects[2]->name }}</span></li>
                        <li><div class="bar" data-percentage="{{ $sb4*10 }}"></div><span>{{ $subjects[3]->name }}</span></li>
                    </ul>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(function(){
                $('.bars li .bar').each(function(key, bar){
                    var percentage = $(this).data('percentage');
                    $(this).animate({
                        'height' : percentage + '%'
                    },1000);
                });
            });
        </script>

    </div>
</div>
    </section>
@endsection


@push('script')



@endpush
