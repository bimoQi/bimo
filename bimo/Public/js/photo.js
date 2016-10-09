	
	//dir非常重要
	hs.graphicsDir = 'http://localhost/ZendStudio/TP_test/ThinkPHP_test/bimo/Public/js/highslide/highslide/graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.wrapperClassName = 'dark borderless floating-caption';
	hs.fadeInOut = true;
	hs.dimmingOpacity = .75;
	hs.showCredits = false; 
	hs.restoreTitle = "点击缩小";
	hs.previousTitle = '上一张';
	hs.nextTitle = '下一张';
	hs.moveTitle = '移动';
	hs.closeTitle = '关闭 (esc)';
	hs.fullExpandTitle ='扩展到实际尺寸(f)';
	hs.playTitle = '播放图册';
	hs.registerOverlay = "bottom center";
	// Add the controlbar
	if (hs.addSlideshow) hs.addSlideshow({
		//slideshowGroup: 'group1',
		interval: 2000,
		repeat: false,
		useControls: true,
		fixedControls: 'fit',
		overlayOptions: {
			opacity: .6,
			position: 'bottom center',
			hideOnMouseOut: true
		}
	});