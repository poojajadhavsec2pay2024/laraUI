<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDmt extends Model
{
    protected $table='report_dmt';
    protected $fillable =  ["id","mobile","txnid","sender_name","beneficiary_id","beneficiary_name","beneficiary_account","beneficiary_ifsc","beneficiary_bankid","amount","charge","gst","ccf","profit","tds","transfer_mode","status","tid","option1","option2","cscount","csremark","remark","apiremark","refno","refno2","groupid","api_id","dt_id","md_id","wl_id","admin_id","user_id","sales_id","ent_id","user_com","usertds","rt_com","rttds","net_rt","dt_com","dttds","net_dt","md_com","mdtds","net_md","wl_com","wltds","net_wl","wladmin_id","wladmin_commi","wladmin_tds","net_wladmincommi","s2p_com","ent_com","enttds","net_entcommi","apipart_com","partner_deal","partner_tds","net_partnercommi","scheme_id","rtrate","mdrate","dtrate","wlrate","wladminrate","entrate","partnerrate","source","is_Decremented","is_Refunded","refund_Date","provider_id","sessionid","created_at","updated_at","via","sender_kyc","lat","lon","ip","approvedby"];

}
