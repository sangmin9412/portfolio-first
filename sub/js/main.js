requirejs([
	'test_01',
	'test_02',
	'test_03',
	'test_04'
	], function() {
		test01();
		test02();
		test03();
		test04();
	});