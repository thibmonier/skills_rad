<?php
/**
 * Created by PhpStorm.
 * User: thmon
 * Date: 26/03/14
 * Time: 11:51
 */

namespace App\Controller;


use Ob\HighchartsBundle\Highcharts\Highchart;

class HomepageController extends Controller
{
    public function indexAction(array $lastProjects, array $technos, array $mostSigned) {

        $ob = new Highchart();
        $ob->chart->renderTo('linechart');
        $ob->title->text('Techno used');
        $ob->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array(
                'enabled' => false
            ),
            'showInLegend' => false
        ));

        $sum=0;
        $data = array();
        foreach ($technos as $value) {
            $sum += $value['1'];
        }
        foreach ($technos as $value) {
            $data[] = array($value['name'], round($value['1']*100/$sum, 2));
        }

        $ob->series(array(
            array(
                'type' => 'pie',
                'name' => 'Browser share',
                'data' => $data
            )
        ));
        return ['chart' => $ob,
            'lastProjects' => $lastProjects,
            'mostSigned' => $mostSigned];


//        return new Response($this->container->get('templating')->render('SmileBackendBundle:Dashboard:dashboard.html.twig', array(
//            'chart' => $ob,
//            'lastProjects' => $lastProjects,
//            'mostSigned' => $mostSigned
//        )));
    }
} 