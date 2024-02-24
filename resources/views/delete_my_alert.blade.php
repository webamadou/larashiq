@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
    <section class="text-center --bg-gradient-primary-to-secondary long-height" id="list-posts-wrapper">
        <div class="container">
        <h2 class="section-title">{{__('front.confirm_delete_alert_alert')}}</h2>

            <div class="row justify-content-center prop-vignettes-wrapper">
                <form method="post" action="{{route('confirm-delete-my-alert', $alert)}}" class="row g-3 d-flex
                justify-content-center">
                    @csrf
                    @method('delete')
                    <div class="col-auto">
                            <h3>{{__('common_terms.alerte_summary')}}</h3>
                            <div class="form-elements">
                                {!! __('front.your_alert_acquisition_'.$alert->acquisition) !!}
                                @if (count($alert->propertyTypes)  == 1)
                                    <strong>{{ strtolower($alert->propertyTypes->first()->name) }}</strong>.
                                @else
                                    @foreach($alert->propertyTypes as $propertyType)
                                        @if ($loop->first && count($alert->propertyTypes) > 2)
                                            <strong>{{ $propertyType->name }}</strong>,
                                        @elseif ($loop->last && count($alert->propertyTypes) > 1)
                                            <strong>
                                                {{__('front.or')}}
                                                {{ $propertyType->name }}
                                            </strong>
                                        @else
                                            <strong>{{ $propertyType->name }}</strong>,
                                        @endif
                                    @endforeach <br>
                                @endif
                            </div>
                            <div class="form-elements">
                                @if (!empty($budgetRange->min) && !empty($budgetRange->max))
                                    {!!__('front.alert_min_max_budget', ['min' => $budgetRange->min, 'max' => $budgetRange->max]) !!} FCFA.
                                @elseif(!empty($budgetRange->min))
                                    {!!__('alert_min_budget',['min' => $budgetRange->min])!!} FCFA.
                                @elseif(!empty($budgetRange->max))
                                    {!!__('alert_max_budget', ['max' => $budgetRange->max])!!} FCFA.
                                @endif
                            </div>
                            @if(!empty($roomsRange->min) || !empty($roomsRange->max))
                                <div class="form-elements">
                                    @if (!empty($roomsRange->min) && !empty($roomsRange->max))
                                        {!!__('front.alert_min_max_rooms', ['min' => $roomsRange->min, 'max' => $roomsRange->max])!!}
                                    @elseif(!empty($roomsRange->min))
                                        {!!__('front.alert_min_rooms',['min' => $roomsRange->min])!!}
                                    @elseif(!empty($roomsRange->max))
                                        {!!__('front.alert_max_rooms', ['max' => $roomsRange->max])!!}
                                    @endif
                                    @if (!empty($bedRoomRange->min) || !empty($bedRoomRange->max))
                                        @if (!empty($bedRoomRange->min) && !empty($bedRoomRange->max))
                                            {!!__('front.alert_min_max_bed_rooms', ['min' => $bedRoomRange->min, 'max' => $bedRoomRange->max])!!}
                                        @elseif(!empty($bedRoomRange->min))
                                            {!!__('front.alert_min_bed_rooms',['min' => $bedRoomRange->min])!!}
                                        @elseif(!empty($bedRoomRange->max))
                                            {!!__('front.alert_max_bed_rooms', ['max' => $bedRoomRange->max])!!}
                                        @endif
                                    @endif
                                </div>
                            @endif
                            @if(!empty($surfaceRange->min) || !empty($surfaceRange->max))
                                <div class="form-elements">
                                    @if (!empty($surfaceRange->min) && !empty($surfaceRange->max))
                                        {!!__('front.alert_min_max_surface', ['min' => $surfaceRange->min, 'max' => $surfaceRange->max])!!}
                                    @elseif(!empty($surfaceRange->min))
                                        {!!__('front.alert_min_surface',['min' => $surfaceRange->min])!!}
                                    @elseif(!empty($surfaceRange->max))
                                        {!!__('front.alert_max_surface', ['max' => $surfaceRange->max])!!}
                                    @endif
                                </div>
                            @endif
                            @if(!empty($floorRange->min) || !empty($floorRange->max))
                                <div class="form-elements">
                                    @if (intval($floorRange->min) > 0 && (intval($floorRange->min) == intval
                                    ($floorRange->max)))
                                        {!!__('front.alert_at_floor', ['max' => $floorRange->min])!!}
                                    @elseif (!empty($floorRange->min) && !empty($floorRange->max))
                                        {!!__('front.alert_min_max_floor', ['min' => $floorRange->min, 'max' =>
                                        $floorRange->max])!!}
                                    @elseif(!empty($floorRange->min))
                                        {!!__('front.alert_min_floor',['min' => $floorRange->min])!!}
                                    @elseif(!empty($floorRange->max))
                                        {!!__('front.alert_max_floor', ['max' => $floorRange->max])!!}
                                    @endif
                                </div>
                            @endif
                            @if(! empty($alert->commodities))
                                <div class="form-elements">
                                    {{__('front.has_commodity')}}
                                    <ul>
                                        @foreach($alert->theCommodities as $commodity)
                                            <li>{!! '<span class="mdi mdi-menu-right"><strong>'.$commodity->name .'</strong>' !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <button type="submit" class="btn btn-primary mb-3 rounded-0 px-5 py-2" aria-label="delete alert">
                            <span class="mdi mdi-trash-can"></span> {{__('common_terms.delete')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
