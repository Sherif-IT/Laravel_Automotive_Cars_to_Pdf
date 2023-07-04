@php
    /**
     * @alias CarViewModel
     * @var $getCarSectionBySectionKey
     **/
    $carHomeBlock = $getCarSectionBySectionKey(CarViewModel::HOMEPAGE_API_URL_KEY);
    $carTechnicalSpecsBlock = $getCarSectionBySectionKey(CarViewModel::TECH_SPECIFICATIONS_API_URL_KEY);
    $carGalleryImagesBlock = $getCarSectionBySectionKey(CarViewModel::GALLERY_API_URL_KEY);
    $carHistoryBlock = $getCarSectionBySectionKey(CarViewModel::HISTORY_API_URL_KEY);
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$carHomeBlock['title']}}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            @font-face {
                font-family: Dosis-Regular;
                src: url('public/fonts/Dosis/Dosis-Regular.ttf');
            }

            @font-face {
                font-family: Dosis-Bold;
                src: url('public/fonts/Dosis/Dosis-Bold.ttf');
            }
            @page {
                margin: 0cm;
            }

            body {
                font-family: Dosis-Bold;
                margin-top: 0.5cm;
                margin-left: 0.5cm;
                margin-right: 0.5cm;
                margin-bottom: 1.5cm;
            }

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 0cm;
            }

            footer {
                position: fixed;
                bottom: 0.5cm;
                left: 0.5cm;
                right: 0.5cm;
                height: 1cm;
            }
            /*section{*/
            /*    padding-bottom: 10px;*/
            /*    margin-bottom: 0px;*/
            /*}*/
            section.car-sections-home-car-2-columns{
                padding-bottom:25px ;
            }
            section, section.car-sections-home-car-description>div>p, section>div{
                padding: 10px;
            }
            {{--  HOME SECTION START   --}}
                {{--  title and tags sect  --}}
            .car-title{
                text-align: center;
            }
            ul.car-specs-inner-title>li, .car-tags-inner-section>li{
                display:inline-block;
            }

            ul.car-specs-inner-title>li:after{
                content: " \00b7";
            }
            .car-history-details-event-date:after, .car-history-details-per-year>h2:after{
                content: "";
                display: inline-block;
                width: 10px;
                height: 10px;
                background-color: #666;
                /*border-radius: 50%;*/
                position: relative;
                border-radius: 5px;
                margin-left: 21px;
                margin-right: -13.2px;
            }
            .car-history-details-per-year>h2:after{
                content: "";
                width: 15px;
                height: 15px;
                border-radius: 7.5px;
                margin-right: -15.7px;
            }
            ul.car-specs-inner-title>li:last-child:after{ content: none; }
                {{--  home gallery and infocolumns   --}}
            .car-sections-home-car-2-columns-parent {
                /*display : flex;*/
                /*flex-direction : row;*/
                /*flex-wrap : wrap;*/
                /*justify-content : flex-start;*/
                /*align-content : flex-start;*/
                /*align-items : stretch;*/
                /*    width: 100%;*/
                /*    display: grid;*/
                /*    grid-template-columns: repeat(2, 1fr);*/
                /*    grid-template-rows: 1fr;*/
                /*    grid-column-gap: 10px;*/
                /*    grid-row-gap: 0px;*/
            }
            /*.car-sections-home-car-2-columns-parent>div {*/
            /*    !*order : 1;*!*/
            /*    flex-grow : 1;*/
            /*}*/

            /*.car-sections-home-car-2-columns-parent:first-child {*/
            /*    align-self : flex-start;*/
            /*}*/

            /*.car-sections-home-car-2-columns-parent:last-child {*/
            /*    align-self : flex-end;*/
            /*}*/
            {{--  home tags   --}}
            .car-tags-title:first-letter, .car-tech-specs-details-group>h3{
                text-transform: capitalize;
            }
            .car-tags-title {
                text-align: left;
            }
            /*Home chassis book*/
            ul.car-tags-inner-section>, .car-history-details-event-details-list, li.car-sections-home-second-column-list{
                list-style-type: none;
            }
            {{--  HOME SECTION END   --}}

            .car-tech-specs-details-wrapper{
                /*align-items: flex-start;*/
                /*display: flex;*/
                /*flex-wrap: wrap;*/
                /*justify-content: flex-start;*/
                /*margin-top: 20px;*/
                /*display: grid;*/
                /*grid-template-columns: repeat(2, 1fr);*/
                /*grid-template-rows: 1fr;*/
                /*grid-column-gap: 10px;*/
                /*grid-row-gap: 0px;*/
            }
            .car-tech-specs-details-wrapper>div{
                /*background-color: #ef4444;*/
                /*!*flex: 0 0 50%;*!*/
                /*!*line-height: 1.4;*!*/
                /*grid-area: 2 / 1 / 3 / 2;*/
                /*margin: 0;*/
            }
            .car-sections-home-columns{
                vertical-align: top;
                width:50%;
            }
            .car-sections-home-image{
                max-width: 100%;
                object-fit: contain;
            }
            .car-sections-home-other-images{
                padding-top: 20px;margin-top: 5px;vertical-align: top;
            }
            table.car-sections-home-second-column-table>tbody>tr>td>h4{
                margin-bottom: 5px
            }

            /**/
            table.car-tech-specs-details-table>tbody>tr>td{
                height: 1px;
            }
            .car-tech-specs-details-group{
                margin-bottom: 15px;
                padding: 10px;
            }
            /**/
            table.footer {
                border: 0px;
                /*border-top: 1px solid #004054;*/
                font-size: 13px;
            }

            table.footer tr, table.footer td {
                border: 0px;
            }

            table.footer td {
                padding-top: 2px;
                padding-bottom: -6px;
                padding-left: 0px;
                padding-right: 0px;
            }
            footer {
                position: fixed;
                bottom: 0.5cm;
                left: 0.5cm;
                right: 0.5cm;
                height: 1cm;
            }
            table {
                border-collapse: collapse;
                table-layout: fixed;
                width: 100%;
                text-align: left;
            }

            table, th, td {
                /*border-width: 1px;*/
                /*border-color: #004054;*/
                /*border-style: solid;*/
            }

            td {
                padding: 1px;
                padding-left: 8px;
                padding-right: 8px;
                /*white-space: nowrap;*/
            }

            td.bold {
                font-family: Dosis-Bold;
                border-width: 2px;
            }
             .page-break {
                 page-break-after: always;
             }
        </style>
    </head>
    <body class="body">
            <div id="car-intro" class="">
                <section class="car-header">
                    <div class="car-title">
                        <h1 class="" style="margin-bottom: 0px">
                            {{$carHomeBlock['title']}}
                        </h1>
                        <div class="car-specs-inner-title">
                            <ul class="car-specs-inner-title" style="padding: 0px; margin:15px 0px;">
                                <li><span>Chassis no.&nbsp;</span><b>{{$carHomeBlock['chassis']}}</b></li>
                                <li><span>Engine no.&nbsp;</span><b>{{$carHomeBlock['engine']}}</b></li>
                                <li><span>Coachbuilder&nbsp;</span><b>{{$carHomeBlock['coachbuilder']}}</b></li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        <div class="page-break"></div>

        <main class="car-sections">
            <div id="car-sections-home" class="">
{{--                <section class="car-sections-home-car-intro">--}}
{{--                   --}}
{{--                </section>--}}
                <h1 style="margin-left: 10px">Home</h1>
                <section class="car-sections-home-car-2-columns">
                    <div class="car-sections-home-car-2-columns-parent">
                        <table width="100%" class="car-sections-home-car-2-columns">
                            <tbody>
                            <tr>
                                <td id="car-sections-home-first-column" class="car-sections-home-columns">
                                    <table width="100%">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <img
                                                    class="car-sections-home-image"
                                                    width="450" src="{{$carHomeBlock['main_image']['thumbnail']}}"
                                                >
                                            </td>
                                        </tr>
                                        @foreach($carHomeBlock['other_images'] as $otherImages)
                                                <?php /** @var $loop **/ $loop->first?:++$loop->index;?>
                                                @if(($loop->first || $loop->index%2!=0) && $loop->index != 1)
                                                    <tr>
                                                        <td>
                                                            <table width="100%">
                                                                <tbody>
                                                                <tr>
                                                @endif
                                                                <td class="car-sections-home-other-images"
                                                                    width="50%"
                                                                    <?php ($loop->index%2!=0 || $loop->first )?$r='padding-left: 0px;margin-left: 0px;':$r='padding-right: 0px;margin-right: 0px;'?>
                                                                    style="<?= $r ?>"
                                                                >
                                                                    <img class="car-sections-home-image"
                                                                         src="{{$otherImages['thumbnail']}}"
                                                                    >
                                                                </td>
                                                @if($loop->index%2==0 && !$loop->first)
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                @endif

                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td id="car-sections-home-second-column" class="car-sections-home-columns">
                                    <table width="100%" class="car-sections-home-second-column-table">
                                        <tbody>
                                        <tr>
                                            <td>{{$carHomeBlock['short_description']}}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Owner</h4>
                                                {{$carHomeBlock['owner']}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Why am I an Automotive Masterpiece?</h4>
                                                <ul style="margin-left: 0px;padding-left: 0px">
                                                    @foreach($carHomeBlock['automotive_groups'] as $automotiveGroups)
                                                        <li class="car-sections-home-second-column-list">{{$automotiveGroups['title']}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <section class="car-sections-home-car-description">
                    <div>
                        <p>
                            <?= $carHomeBlock['description'] ?>
                        </p>
                    </div>
                </section>
                <section  class="car-sections-home-car-chassis-book">
                    <div>
                     <h3 class="car-chassis-book">Chassis books</h3> {{-- TODO insert in constants--}}
                    <ul style="margin-left: 0px;padding-left: 0px">
                    @foreach($carHomeBlock['chassis_books'] as $carChassisBook)
                        <u><li style="list-style-type: none">{{$carChassisBook}}</li></u> {{--TODO Transfrom text with view model TODO Tinsert link collections/chassis-book--}}
                    @endforeach
                    </ul>
                    </div>
                </section>
            </div>
{{--            --}}{{--  TODO saut de page --}}
{{--            --}}{{--  TODO ajout grand titre tech specs --}}
            <hr>
            <div id="car-sections-technical-specs" class="">
                <h1 style="margin-left: 10px">Technical Specifications</h1>
                <section class="car-sections-technical-specs-car-details">
                    @foreach($carTechnicalSpecsBlock as $key => $carTechnicalSpecsDetails)
                        <div id="car-tech-specs-details-<?=$key?>" class="car-tech-specs-details-group">
                            <h3 class="car-tech-specs-details-group-title">{{$key}}</h3>
                            <div class="car-tech-specs-details-wrapper">
                                <table class="car-tech-specs-details-table" style="vertical-align: top" width="100%">
                                        <tbody>
                                        @foreach($carTechnicalSpecsDetails as $carTechnicalSpecsDetail)
                                            <?php /** @var $loop **/ $loop->first?:++$loop->index;?>
                                            @if(($loop->first || $loop->index%2!=0) && $loop->index != 1)
                                                <tr style="line-height: 15px;white-space: nowrap;overflow: hidden;vertical-align: top">
                                            @endif
                                                    <td width="50%" style="height: 5px;padding: 0px;margin: 0px">
                                                        <p class="car-tech-specs-details-desc-value">
                                                            <span><b>{{$carTechnicalSpecsDetail['description']}}</b>&nbsp;</span>
                                                            <span>{{$carTechnicalSpecsDetail['value']}}</span>
                                                        </p>
                                                    </td>
                                            @if($loop->index%2==0 && !$loop->first)
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
            <hr>
            <div>
                <h1 class="car-tags-title" style="margin-bottom: 50px;margin-left: 10px">
                    {{CarViewModel::TAGS_API_URL_KEY}}
                </h1>
                <section class="car-sections-home-car-tags">
                    <div class="car-sections-home-car-tag">
                        @foreach ($carHomeBlock['tags'] as $tagBlocks)
                            <h4 style="margin-bottom: 10px">{{$tagBlocks['title']}}</h4>
                            <p>{{$tagBlocks['description']}}</p>
                            <ul class="car-tags-inner-section" style="margin-left: 0px;padding-left: 0px">
                                @foreach($tagBlocks['tags'] as $tagBlock)
                                    <li ><span><u><a href="{{$getTagUrl($tagBlock)}}">{{$tagBlock}}</a></u></span></li>
                                @endforeach
                            </ul>
                        @endforeach
                        <p>
                        </p>
                    </div>
                    <div>
                        <p>
                        </p>
                    </div>
                </section>
            </div>
            <hr>
            <div id="car-sections-car-history" class="">
                <h1 style="margin-left: 10px">Car History</h1>
                <section class="car-sections-car-history-details">
                    <table class="car-sections-car-history-details-table">
                        <tbody>
                        @foreach($carHistoryBlock as $period => $carHistoryEvents)
                                <tr class="car-history-details-period-events-group-per-year">
                                    <td class="car-history-details-per-year" style="border-right: 0.5px black solid;text-align: right;vertical-align: top"><h2>{{$period}}</h2></td>
                                    <td>&nbsp;</td>
                                </tr>
                                @foreach($carHistoryEvents as $carHistoricalEvent)
                                    <tr class="car-history-details-period-single-event">
                                        <td width="25%" class="car-history-details-event-date" style="border-right: 0.5px black solid;text-align: right;vertical-align: top"><?= $carHistoricalEvent['dateHTML'] ?></td>
                                        <td width="75%" class="car-history-details-event-details-desc-value" style="text-align: left;margin-left: 0px;border-left: 0px;vertical-align: top">
                                            <ul class="car-history-details-event-details-list" style="margin-top: 0px">

                                                <?php if (isset($carHistoricalEvent['description'])){ ?>
                                                    <li>{{$carHistoricalEvent['description']}}</li>
                                                <?php } ?>

                                                <?php if (isset($carHistoricalEvent['details'])){ ?>
                                                @foreach($carHistoricalEvent['details'] as $carEventDetails)
                                                    <li>
                                                        <span>{{$carEventDetails['description']}}</span>
                                                        <span><b><?= $carEventDetails['value'] ?></b></span>
                                                    </li>
                                                @endforeach
                                                <?php } ?>

                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
            <hr>
            <div class="page-break"></div>
            <div id="car-sections-gallery-images" class="">
                <h1 style="margin-left: 10px">Gallery</h1>
                <section class="car-sections-all-gallery-images">
                    <div class="car-sections-all-gallery-images-groups">
                        @foreach($carGalleryImagesBlock as $carGalleryImageData)
                        <div class="car-single-group-images">
                            <h3 class="car-all-gallery-single-group-images">
                                <?= $carGalleryImageData['description']?>
                            </h3>
                            <div class="car-all-single-group-images" style="  ">
                                @foreach($carGalleryImageData['images'] as $carGalleryImage)
                                    <div class="car-single-group-image" style="padding: 0 10px 5px 0;display: inline-block;vertical-align: top;">
                                        <img width="190" height="127" src="{{$carGalleryImage['thumbnail']}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </main>
        <footer>
            <table class="footer">
                <tr>
                    <td width="33%">RESEARCH BY AUTOMOTIVE MASTERPIECES Srl</td>
                    <td width="34%" rowspan="2" class="align-center">Mettere titolo pdf</td>
                    <td width="33%" class="align-right">Genova, {{date('d F Y')}}</td>
                </tr>
                <tr>
                    <td>
                        <a href="https://automotivemasterpieces.com">automotivemasterpieces.com</a>
                    </td>
                    <td class="align-right">
                        <span class="page-indicator"></span>
                    </td>
                </tr>
            </table>
        </footer>
    </body>
</html>
