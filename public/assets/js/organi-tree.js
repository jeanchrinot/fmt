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
  id: 'myTree'
  treeParams: treeParams,
  link_width: '4px',
  link_color: '#2199e8'
});