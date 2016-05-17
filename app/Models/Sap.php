<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class Sap extends Model
{
    //
    protected $table = 'sap_';


    /**
     * fungsi untuk mendapatkan no PR dengan menggunakan no PO
     *
     * @param $query
     * @param $po
     * @return no_pr, wbs, unit_pr, material_num, bidder_list, rfq
     */
    public function scopeListPR($query, $po){
        $list_pr = $this->select('purchase_requisition as no_pr', 'wbs_element as wbs', 'description as unit_pr', 'material_num', 'bidder_list', 'rfq')
            ->where('purchase_order', $po)
            ->where('purchase_requisition', '!=', 'null');
        return $list_pr;
    }

    /**
     * fungsi untuk mendapatkan no PO dengan menggunakan no PR
     *
     * @param $query
     * @param $pr
     * @return no_po, date_po, vendor_name
     */
    public function scopeListPO($query, $pr){
        return $this->select('purchase_order as no_po', 'document_date as date_po', 'vendor_1 as vendor')
            ->where('purchase_requisition', $pr);
    }

    /**
     * @param $query
     * @param $po
     * @return 'no_gr', 'gr_item', 'gr_quantity', 'movement_type'
     */
    public function scopeListGR($query, $po){
        return $this->select('good_receipt as no_gr', 'gr_item', 'gr_quantity', 'movement_type')
            ->where('purchase_order', $po)
            ->where('good_receipt', '!=', 'null');
    }

}
