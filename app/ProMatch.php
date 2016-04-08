<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProMatch extends Model
{
    //

    protected $table = 'pro_match_league';

    public $timestamps = false;

    protected $fillable = [
        'team_local_id',
        'team_visitor_id',
        'league_id',
        'local_score',
        'visitor_score',
        'PO_local_id',
        'DFC_local_id',
        'LTI_local_id',
        'LTD_local_id',
        'MCD_local_id',
        'MC_local_id',
        'MI_local_id',
        'MD_local_id',
        'MCO_local_id',
        'EI_local_id',
        'ED_local_id',
        'DI_local_id',
        'DD_local_id',
        'DC_local_id',
        'PO_local_red',
        'DFC_local_red',
        'LTI_local_red',
        'LTD_local_red',
        'MCD_local_red',
        'MC_local_red',
        'MI_local_red',
        'MD_local_red',
        'MCO_local_red',
        'EI_local_red',
        'ED_local_red',
        'DI_local_red',
        'DD_local_red',
        'DC_local_red',
        'PO_local_yellow',
        'DFC_local_yellow',
        'LTI_local_yellow',
        'LTD_local_yellow',
        'MCD_local_yellow',
        'MC_local_yellow',
        'MI_local_yellow',
        'MD_local_yellow',
        'MCO_local_yellow',
        'EI_local_yellow',
        'ED_local_yellow',
        'DI_local_yellow',
        'DD_local_yellow',
        'DC_local_yellow',
        'PO_local_goal',
        'DFC_local_goal',
        'LTI_local_goal',
        'LTD_local_goal',
        'MCD_local_goal',
        'MC_local_goal',
        'MI_local_goal',
        'MD_local_goal',
        'MCO_local_goal',
        'EI_local_goal',
        'ED_local_goal',
        'DI_local_goal',
        'DD_local_goal',
        'DC_local_goal',
        'PO_local_assistance',
        'DFC_local_assistance',
        'LTI_local_assistance',
        'LTD_local_assistance',
        'MCD_local_assistance',
        'MC_local_assistance',
        'MI_local_assistance',
        'MD_local_assistance',
        'MCO_local_assistance',
        'EI_local_assistance',
        'ED_local_assistance',
        'DI_local_assistance',
        'DD_local_assistance',
        'DC_local_assistance',
        'PO_local_best_player',
        'DFC_local_best_player',
        'LTI_local_best_player',
        'LTD_local_best_player',
        'MCD_local_best_player',
        'MC_local_best_player',
        'MI_local_best_player',
        'MD_local_best_player',
        'MCO_local_best_player',
        'EI_local_best_player',
        'ED_local_best_player',
        'DI_local_best_player',
        'DD_local_best_player',
        'DC_local_best_player',
        'PO_local_unbeaten',
        'PO_visitor_id',
        'DFC_visitor_id',
        'LTI_visitor_id',
        'LTD_visitor_id',
        'MCD_visitor_id',
        'MC_visitor_id',
        'MI_visitor_id',
        'MD_visitor_id',
        'MCO_visitor_id',
        'EI_visitor_id',
        'ED_visitor_id',
        'DI_visitor_id',
        'DD_visitor_id',
        'DC_visitor_id',
        'PO_visitor_red',
        'DFC_visitor_red',
        'LTI_visitor_red',
        'LTD_visitor_red',
        'MCD_visitor_red',
        'MC_visitor_red',
        'MI_visitor_red',
        'MD_visitor_red',
        'MCO_visitor_red',
        'EI_visitor_red',
        'ED_visitor_red',
        'DI_visitor_red',
        'DD_visitor_red',
        'DC_visitor_red',
        'PO_visitor_yellow',
        'DFC_visitor_yellow',
        'LTI_visitor_yellow',
        'LTD_visitor_yellow',
        'MCD_visitor_yellow',
        'MC_visitor_yellow',
        'MI_visitor_yellow',
        'MD_visitor_yellow',
        'MCO_visitor_yellow',
        'EI_visitor_yellow',
        'ED_visitor_yellow',
        'DI_visitor_yellow',
        'DD_visitor_yellow',
        'DC_visitor_yellow',
        'PO_visitor_goal',
        'DFC_visitor_goal',
        'LTI_visitor_goal',
        'LTD_visitor_goal',
        'MCD_visitor_goal',
        'MC_visitor_goal',
        'MI_visitor_goal',
        'MD_visitor_goal',
        'MCO_visitor_goal',
        'EI_visitor_goal',
        'ED_visitor_goal',
        'DI_visitor_goal',
        'DD_visitor_goal',
        'DC_visitor_goal',
        'PO_visitor_assistance',
        'DFC_visitor_assistance',
        'LTI_visitor_assistance',
        'LTD_visitor_assistance',
        'MCD_visitor_assistance',
        'MC_visitor_assistance',
        'MI_visitor_assistance',
        'MD_visitor_assistance',
        'MCO_visitor_assistance',
        'EI_visitor_assistance',
        'ED_visitor_assistance',
        'DI_visitor_assistance',
        'DD_visitor_assistance',
        'DC_visitor_assistance',
        'PO_visitor_best_player',
        'DFC_visitor_best_player',
        'LTI_visitor_best_player',
        'LTD_visitor_best_player',
        'MCD_visitor_best_player',
        'MC_visitor_best_player',
        'MI_visitor_best_player',
        'MD_visitor_best_player',
        'MCO_visitor_best_player',
        'EI_visitor_best_player',
        'ED_visitor_best_player',
        'DI_visitor_best_player',
        'DD_visitor_best_player',
        'DC_visitor_best_player',
        'PO_visitor_unbeaten',

    ];

    public function localProTeam()
    {
        return $this->belongsTo('App\ProTeam','team_local_id')
            ->withTrashed();
    }

    public function visitorProTeam()
    {
        return $this->belongsTo('App\ProTeam','team_visitor_id')
            ->withTrashed();
    }

    public function proLeague()
    {
        return $this->belongsTo('App\ProLeague','league_id');
    }

    public function PO_local()
    {
        return $this->belongsTo('App\User','PO_local_id');
    }


    public function DFC_local()
    {
        return $this->belongsTo('App\User','DFC_local_id');
    }


    public function LTI_local()
    {
        return $this->belongsTo('App\User','LTI_local_id');
    }


    public function LTD_local()
    {
        return $this->belongsTo('App\User','LTD_local_id');
    }


    public function MCD_local()
    {
        return $this->belongsTo('App\User','MCD_local_id');
    }


    public function MC_local()
    {
        return $this->belongsTo('App\User','MC_local_id');
    }


    public function MI_local()
    {
        return $this->belongsTo('App\User','MI_local_id');
    }


    public function MD_local()
    {
        return $this->belongsTo('App\User','MD_local_id');
    }

    public function MCO_local()
    {
        return $this->belongsTo('App\User','MCO_local_id');
    }

    public function EI_local()
    {
        return $this->belongsTo('App\User','EI_local_id');
    }

    public function ED_local()
    {
        return $this->belongsTo('App\User','ED_local_id');
    }

    public function DI_local()
    {
        return $this->belongsTo('App\User','DI_local_id');
    }

    public function DD_local()
    {
        return $this->belongsTo('App\User','DD_local_id');
    }

    public function DC_local()
    {
        return $this->belongsTo('App\User','DC_local_id');
    }
    
     public function DFC2_local()
    {
        return $this->belongsTo('App\User','DFC2_local_id');
    }

    public function DFC3_local()
    {
        return $this->belongsTo('App\User','DFC3_local_id');
    }

    public function MCD2_local()
    {
        return $this->belongsTo('App\User','MCD2_local_id');
    }

    public function MC2_local()
    {
        return $this->belongsTo('App\User','MC2_local_id');
    }
    
        public function MVI_local()
    {
        return $this->belongsTo('App\User','MVI_local_id');
    }

    public function MVD_local()
    {
        return $this->belongsTo('App\User','MVD_local_id');
    }

    public function MCO2_local()
    {
        return $this->belongsTo('App\User','MCO2_local_id');
    }

    
    
    

    public function PO_visitor()
    {
        return $this->belongsTo('App\User','PO_visitor_id');
    }


    public function DFC_visitor()
    {
        return $this->belongsTo('App\User','DFC_visitor_id');
    }


    public function LTI_visitor()
    {
        return $this->belongsTo('App\User','LTI_visitor_id');
    }


    public function LTD_visitor()
    {
        return $this->belongsTo('App\User','LTD_visitor_id');
    }


    public function MCD_visitor()
    {
        return $this->belongsTo('App\User','MCD_visitor_id');
    }


    public function MC_visitor()
    {
        return $this->belongsTo('App\User','MC_visitor_id');
    }


    public function MI_visitor()
    {
        return $this->belongsTo('App\User','MI_visitor_id');
    }


    public function MD_visitor()
    {
        return $this->belongsTo('App\User','MD_visitor_id');
    }

    public function MCO_visitor()
    {
        return $this->belongsTo('App\User','MCO_visitor_id');
    }

    public function EI_visitor()
    {
        return $this->belongsTo('App\User','EI_visitor_id');
    }

    public function ED_visitor()
    {
        return $this->belongsTo('App\User','ED_visitor_id');
    }

    public function DI_visitor()
    {
        return $this->belongsTo('App\User','DI_visitor_id');
    }

    public function DD_visitor()
    {
        return $this->belongsTo('App\User','DD_visitor_id');
    }

    public function DC_visitor()
    {
        return $this->belongsTo('App\User','DC_visitor_id');
    }
    
      public function DFC2_visitor()
    {
        return $this->belongsTo('App\User','DFC2_visitor_id');
    }

    public function DFC3_visitor()
    {
        return $this->belongsTo('App\User','DFC3_visitor_id');
    }

    public function MCD2_visitor()
    {
        return $this->belongsTo('App\User','MCD2_visitor_id');
    }

    public function MC2_visitor()
    {
        return $this->belongsTo('App\User','MC2_visitor_id');
    }
    
        public function MVI_visitor()
    {
        return $this->belongsTo('App\User','MVI_visitor_id');
    }

    public function MVD_visitor()
    {
        return $this->belongsTo('App\User','MVD_visitor_id');
    }

    public function MCO2_visitor()
    {
        return $this->belongsTo('App\User','MCO2_visitor_id');
    }


}