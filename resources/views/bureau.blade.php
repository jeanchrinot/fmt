@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="/assets/css/tree_maker-min.css">
<script type="text/javascript" src="/assets/js/tree_maker-min.js"></script>
@endsection

@section('title','Membres de Bureau')

@section('main')
<section class="md-section bg-lighter">
	<div class="container p-4">
		<div class="row wow slideInRight">
			<div class="col-7 section-title">
				<h1 class="text-muted section-title--styled">Membres de <span class="red">Bureau</span></h1>
			</div>
		</div>
		<div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12 mb-3 wow fadeInLeft">
		       <div id="myTree"></div>
		    </div>
		  </div>
	</div>
</section>
@endsection

@section('scripts')
<script type="text/javascript">
	let tree = {
    1: {
        2: '',
        3: {
            6: '',
            7: '',
        },
        4: '',
        5: ''
    }
};

let treeParams = {
    1: {trad: 'Président'},
    2: {trad: 'Vice-Président'},
    3: {trad: 'Conseiller'},
    4: {trad: 'Sécretaire Général'},
    5: {trad: 'Députés'},
    6: {trad: 'Conseiller informatique'},
    7: {trad: 'Conseiller informatique'}
};

treeMaker(tree, {
        id: 'myTree', card_click: function (element) {
            console.log(element);
        },
        treeParams: treeParams,
        'link_width': '4px',
        'link_color': '#017e3a',
    });
</script>
@endsection
