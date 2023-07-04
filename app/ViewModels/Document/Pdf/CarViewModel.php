<?php

namespace App\ViewModels\Document\Pdf;

use Illuminate\Support\Facades\Http;
use Spatie\ViewModels\ViewModel;

class CarViewModel extends ViewModel
{
    const HOMEPAGE_API_URL_KEY = 'homepage';
    const TECH_SPECIFICATIONS_API_URL_KEY = 'technical-specifications';
    const HISTORY_API_URL_KEY = 'history';
    const GALLERY_API_URL_KEY = 'gallery';
    const TAGS_API_URL_KEY = 'tags';
    const BASE_API_DOMAIN_KEY = 'https://automotivemasterpieces.com';
    private string $carId;

    //    private string $carFileName;

    public function __construct(string $carId)
    {
        $this->carId = $carId;
    }

    public function getCarFileName()
    {

        return 'car' . $this->getCarId();
    }

    /**
     * @return string
     */
    public function getCarId(): string
    {
        return $this->carId;
    }

    public function getCarSectionBySectionKey(string $section): array
    {
        $data = [];
        switch ($section)
        {
            case self::HOMEPAGE_API_URL_KEY:
                $carSection = $this->queryCarSectionBySectionKey(self::HOMEPAGE_API_URL_KEY);
                $chassisBooks = [];
                foreach ($carSection['books'] as $chassisBook) {
                    $chassisBooks[] = $chassisBook['image']['description'];
                }
                return [
                    'title' => $carSection['title'],
                    'chassis' => $carSection['chassis'],
                    'engine' => $carSection['engine'],
                    'coachbuilder' => $carSection['coachbuilder'],
                    'short_description' => $carSection['short_description'],
                    'owner' => $carSection['owner'],
                    'automotive_groups' => $carSection['eligible_categories'],
                    'main_image' => $carSection['main_image'],
                    'other_images' => $carSection['other_images'],
                    'description' => $carSection['description'],
                    'tags' => $carSection['tag_groups'],
                    'chassis_books' => $chassisBooks,
                ];

            case self::TECH_SPECIFICATIONS_API_URL_KEY:
                $carSection = $this->queryCarSectionBySectionKey(self::TECH_SPECIFICATIONS_API_URL_KEY);
                foreach ($carSection['sections'] as $carTechSection)
                {
                    foreach ($carTechSection["items"] as $carSectionItem)
                    {
                        //TODO test case multiple items
                        $data[strtolower($carTechSection['title'])] = $carSectionItem['details'];
                    }
                }

                return $data;

            case self::HISTORY_API_URL_KEY:
                $carSection = $this->queryCarSectionBySectionKey(self::HISTORY_API_URL_KEY);
                $outputData = [];
                foreach ($carSection['history'] as $carHistory)
                {
                    $period = strtolower($carHistory['period']);
                    foreach ($carHistory["events"] as $carHistoricalEvent)
                    {
                        //TODO check description null
                        $outputData[$carHistoricalEvent['item_id']]['dateHTML'] = $carHistoricalEvent['date']['html'];
                        $outputData[$carHistoricalEvent['item_id']]['description'] = $carHistoricalEvent['description'];
                        $outputData[$carHistoricalEvent['item_id']]['images'] = count($carHistoricalEvent['images']);
                        $outputData[$carHistoricalEvent['item_id']]['videos'] = count($carHistoricalEvent['videos']);
                        foreach ($carHistoricalEvent['details'] as $carHistoricalDetails)
                        {
                            $outputData[$carHistoricalEvent['item_id']]['details'][] = [
                                'description'=>$carHistoricalDetails['description'],
                                'value'=>$carHistoricalDetails['value'],
                            ];
                        }
                        $data[$period][] = $outputData[$carHistoricalEvent['item_id']];
                    }
                }

                return $data;

            case self::GALLERY_API_URL_KEY:
                $carSection = $this->queryCarSectionBySectionKey(self::GALLERY_API_URL_KEY);
                foreach ($carSection['sections'] as $carSections)
                {
                    foreach ($carSections['history'] as $key => $carGallerySection)
                    {
                            $data[$key]['description'] = $carGallerySection['description'];
                            $data[$key]['images'] = [];
                            foreach ($carGallerySection['images']as $carImage){
                                $data[$key]['images'][] = [
                                    'link'=> $carImage['link'],
                                    'thumbnail'=>$carImage['thumbnail'],
                                    'visibility'=>$carImage['visibility'],
                                ];
                            }
                    }
                }

                return $data;

            case self::TAGS_API_URL_KEY:
                $carSection = $this->queryCarSectionBySectionKey(self::TAGS_API_URL_KEY);

                return $data;
        }

        return [];
    }

    public function queryCarSectionBySectionKey(string $section): array
    {
        //TODO put credentials in config or env
        return Http::withBasicAuth('admin-am', 'G3n0v4#2019')
            ->baseUrl(self::BASE_API_DOMAIN_KEY)
            ->get("/api/cars/{$this->carId}/{$section}")
            ->json()
            ['data'];
    }
    public function getTagUrl(string $tag):string
    {

        return self::BASE_API_DOMAIN_KEY.'/tags/'.str_replace('#', '', $tag);
    }
}
