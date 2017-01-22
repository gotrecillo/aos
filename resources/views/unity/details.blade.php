@if($unity->melee)
    @include('unity.weaponsTable', ['type' => 'MELEE WEAPONS', 'attacks' => json_decode($unity->melee)])
@endif

@if($unity->missile)
    @include('unity.weaponsTable', ['type' => 'MISSILE WEAPONS', 'attacks' => json_decode($unity->missile)])
@endif