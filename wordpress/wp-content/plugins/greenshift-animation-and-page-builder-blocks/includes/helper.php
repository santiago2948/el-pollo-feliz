<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

//////////////////////////////////////////////////////////////////
// Style Store Class
//////////////////////////////////////////////////////////////////

class GreenShiftStyleStore {
    private static $instance = null;
    private $styles = [];
	private $classstyles = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function addStyle($selector, $css) {
        if (!isset($this->styles[$selector])) {
            $this->styles[$selector] = $css;
        }
    }

    public function getStyles() {
        return $this->styles;
    }

    public function renderStyles() {
        $output = '';
        foreach ($this->styles as $selector => $css) {
            $output .= $selector . '{' . $css . '}';
        }
        return $output;
    }

	public function addClassStyle($selector, $css) {
        if (!isset($this->classstyles[$selector])) {
            $this->classstyles[$selector] = $css;
        }
    }

	public function getClassStyles() {
        return $this->classstyles;
    }

	public function renderClassStyles() {
        $output = '';
        foreach ($this->classstyles as $selector => $css) {
            $output .= $css;
        }
        return $output;
    }
}

//////////////////////////////////////////////////////////////////
// Render animation for dynamic blocks
//////////////////////////////////////////////////////////////////

if (!function_exists('gspb_AnimationRenderProps')) {
	function gspb_AnimationRenderProps($animation = '', $interactionLayers = [], $staggerclass='')
	{
		$animeprops = array();
		if ($animation || !empty($interactionLayers)) {

			if (!empty($animation['usegsap'])) {

				$animeprops['data-gsapinit'] = 1;
				$animeprops['data-from'] = "yes";

				if (!empty($animation['delay'])) {
					$animeprops['data-delay'] = floatval($animation['delay']) / 1000;
				}
				if (!empty($animation['duration'])) {
					$animeprops['data-duration'] = floatval($animation['duration']) / 1000;
				}
				if (!empty($animation['ease'])) {
					$animeprops['data-ease'] = esc_attr($animation['ease']);
					if (isset($animation['easecustom']) && $animation['ease'] == 'custom') {
						$animeprops['data-easecustom'] = esc_attr($animation['easecustom']);
					}
				}
				if (!empty($animation['x'])) {
					$animeprops['data-x'] = esc_attr($animation['x']);
				}
				if (!empty($animation['y'])) {
					$animeprops['data-y'] = esc_attr($animation['y']);
				}
				if (!empty($animation['z'])) {
					$animeprops['data-z'] = esc_attr($animation['z']);
				}
				if (!empty($animation['rx'])) {
					$animeprops['data-rx'] = esc_attr($animation['rx']);
				}
				if (!empty($animation['ry'])) {
					$animeprops['data-ry'] = esc_attr($animation['ry']);
				}
				if (!empty($animation['r'])) {
					$animeprops['data-r'] = esc_attr($animation['r']);
				}
				if (!empty($animation['s'])) {
					$animeprops['data-s'] = esc_attr($animation['s']);
				}
				if (!empty($animation['sy'])) {
					$animeprops['data-sy'] = esc_attr($animation['sy']);
				}
				if (!empty($animation['sx'])) {
					$animeprops['data-sy'] = esc_attr($animation['sx']);
				}
				if (isset($animation['o'])) {
					$animeprops['data-o'] = esc_attr($animation['o']);
				}
				if (!empty($animation['xo'])) {
					$animeprops['data-xo'] = esc_attr($animation['xo']);
				}
				if (!empty($animation['yo'])) {
					$animeprops['data-yo'] = esc_attr($animation['yo']);
				}
				if (!empty($animation['clipFinal'])) {
					$animeprops['data-clippath'] = esc_attr($animation['clipFinal']);
				}
				if (!empty($animation['bg'])) {
					$animeprops['data-bg'] = esc_attr($animation['bg']);
				}
				if (!empty($animation['color'])) {
					$animeprops['data-color'] = esc_attr($animation['color']);
				}
				if (!empty($animation['skewX'])) {
					$animeprops['data-skewX'] = esc_attr($animation['skewX']);
				}
				if (!empty($animation['skewY'])) {
					$animeprops['data-skewY'] = esc_attr($animation['skewY']);
				}
				if (!empty($animation['origin'])) {
					$animeprops['data-origin'] = esc_attr($animation['origin']);
				}
				if (!empty($animation['triggerstart'])) {
					$animeprops['data-triggerstart'] = esc_attr($animation['triggerstart']);
				}
				if (!empty($animation['triggerend'])) {
					$animeprops['data-triggerend'] = esc_attr($animation['triggerend']);
				}
				if (!empty($animation['triggeraction'])) {
					$animeprops['data-triggeraction'] = esc_attr($animation['triggeraction']);
				}
				if (!empty($animation['triggerscrub'])) {
					$animeprops['data-triggerscrub'] = esc_attr($animation['triggerscrub']);
				}
				if (!empty($animation['customProps'])) {
					$animeprops['data-customprops'] = json_encode($animation['customProps']);
				}
				if (!empty($animation['customPropsM'])) {
					$animeprops['data-custompropsM'] = json_encode($animation['customPropsM']);
				}
				if (!empty($animation['set_from']) && $animation['set_from'] == 'to') {
					$animeprops['data-from'] = "";
				}
				if (!empty($animation['loop'])) {
					$animeprops['data-loop'] = "yes";
					if (!empty($animation['yoyo'])) {
						$animeprops['data-yoyo'] = "yes";
					}
					if (!empty($animation['repeatdelay'])) {
						$animeprops['data-repeatdelay'] = "yes";
					}
				}
				if (!empty($animation['varwidth'])) {
					$animeprops['data-varwidth'] = esc_attr($animation['varwidth']);
				}
				if (!empty($animation['varheight'])) {
					$animeprops['data-varheight'] = esc_attr($animation['varheight']);
				}
				if (!empty($animation['winwidth'])) {
					$animeprops['data-winwidth'] = esc_attr($animation['winwidth']);
				}
				if (!empty($animation['winheight'])) {
					$animeprops['data-winheight'] = esc_attr($animation['winheight']);
				}
				if (!empty($animation['observetype'])) {
					$animeprops['data-observetype'] = esc_attr($animation['observetype']);
				}
				if (!empty($animation['additive'])) {
					$animeprops['data-additive'] = esc_attr($animation['additive']);
				}
				if (!empty($animation['durationfollow'])) {
					$animeprops['data-durationfollow'] = esc_attr($animation['durationfollow']);
				}
				if (!empty($animation['tolerance'])) {
					$animeprops['data-tolerance'] = esc_attr($animation['tolerance']);
				}
				if (!empty($animation['addspeedX'])) {
					$animeprops['data-addspeedX'] = esc_attr($animation['addspeedX']);
				}
				if (!empty($animation['addspeedY'])) {
					$animeprops['data-addspeedY'] = esc_attr($animation['addspeedY']);
				}
				if (!empty($animation['maxX'])) {
					$animeprops['data-maxx'] = esc_attr($animation['maxX']);
				}
				if (!empty($animation['xM'])) {
					$animeprops['data-xM'] = esc_attr($animation['xM']);
				}
				if (!empty($animation['yM'])) {
					$animeprops['data-yM'] = esc_attr($animation['yM']);
				}
				if (!empty($animation['zM'])) {
					$animeprops['data-zM'] = esc_attr($animation['zM']);
				}
				if (!empty($animation['xoM'])) {
					$animeprops['data-xoM'] = esc_attr($animation['xoM']);
				}
				if (!empty($animation['yoM'])) {
					$animeprops['data-yoM'] = esc_attr($animation['yoM']);
				}
				if (!empty($animation['rM'])) {
					$animeprops['data-rM'] = esc_attr($animation['rM']);
				}
				if (!empty($animation['rxM'])) {
					$animeprops['data-rxM'] = esc_attr($animation['rxM']);
				}
				if (!empty($animation['ryM'])) {
					$animeprops['data-ryM'] = esc_attr($animation['ryM']);
				}
				if (!empty($animation['sM'])) {
					$animeprops['data-sM'] = esc_attr($animation['sM']);
				}
				if (!empty($animation['sxM'])) {
					$animeprops['data-sxM'] = esc_attr($animation['sxM']);
				}
				if (!empty($animation['syM'])) {
					$animeprops['data-syM'] = esc_attr($animation['syM']);
				}
				if (!empty($animation['skewXM'])) {
					$animeprops['data-skewXM'] = esc_attr($animation['skewXM']);
				}
				if (!empty($animation['skewYM'])) {
					$animeprops['data-skewYM'] = esc_attr($animation['skewYM']);
				}
				if (!empty($animation['oM'])) {
					$animeprops['data-oM'] = esc_attr($animation['oM']);
				}
				if (!empty($animation['usemobile'])) {
					$animeprops['data-usemobile'] = "yes";
				}
				if (!empty($animation['triggerstartM'])) {
					$animeprops['data-triggerstartM'] = esc_attr($animation['triggerstartM']);
				}
				if (!empty($animation['triggerendM'])) {
					$animeprops['data-triggerendM'] = esc_attr($animation['triggerendM']);
				}
				if (!empty($animation['customtrigger'])) {
					$animeprops['data-customtrigger'] = esc_attr($animation['customtrigger']);
				}
				if (!empty($animation['customobject'])) {
					$animeprops['data-customobject'] = esc_attr($animation['customobject']);
				}
				if (!empty($animation['triggertype'])) {
					$animeprops['data-triggertype'] = esc_attr($animation['triggertype']);
				}
				if ((!empty($animation['text']) && empty($animation['type'])) || (isset($animation['type']) && $animation['type'] == 'text_transformations')) {
					if (!empty($animation['texttype'])) {
						$animeprops['data-text'] = esc_attr($animation['texttype']);
					} else {
						$animeprops['data-text'] = 'words';
					}
					if (!empty($animation['textdelay'])) {
						$animeprops['data-stdelay'] = esc_attr($animation['textdelay']);
					}
					if (!empty($animation['textrandom'])) {
						$animeprops['data-strandom'] = "yes";
					}
				} else if ((!empty($animation['stagger']) && empty($animation['type'])) || (isset($animation['type']) && $animation['type'] == 'stagger_transformations')) {
					if (!empty($animation['staggerdelay'])) {
						$animeprops['data-stdelay'] = esc_attr($animation['staggerdelay']);
					}
					if (!empty($animation['staggerrandom'])) {
						$animeprops['data-strandom'] = "yes";
					}
					if(!empty($animation['stselectorEnable']) && !empty($animation['stselector'])){
						$animeprops['data-stagger'] = esc_attr($animation['stselector']);
					}else if($staggerclass){
						$animeprops['data-stagger'] = esc_attr($staggerclass);
					}else{
						$animeprops['data-stchild'] = "yes";
					}
				}
				if ((!empty($animation['o']) && ($animation['o'] == 1 || $animation['o'] === 0)) || !empty($animation['prehide'])) {
					if((!empty($animation['set_from']) && $animation['set_from'] == 'to')){

					}else{
						$animeprops['data-prehidden'] = 1;
					}
				}
				if (!empty($animation['onload']) && empty($animation['triggertype'])) {
					$animeprops['data-triggertype'] = "load";
				}
				if(!empty($animation['multiple_animation'])){
					$animeprops['multianimations'] = json_encode($animation['multiple_animation']);
				}
				if (!empty($animation['multikeyframes'])) {
					$animeprops['data-multikeyframes'] = "yes";
				}
				if(isset($animation['type']) && $animation['type'] == 'svg'){
					$animeprops['data-path'] = esc_attr($animation['path']) || null;
					$animeprops['data-path-align'] = esc_attr($animation['path_align']) || null;
					$animeprops['data-path-orient'] = esc_attr($animation['path_orient']) || null;
					$animeprops['data-path-alignx'] = esc_attr($animation['path_align_x']) || null;
					$animeprops['data-path-aligny'] = esc_attr($animation['path_align_y']) || null;
					$animeprops['data-path-start'] = esc_attr($animation['path_start']) || null;
					$animeprops['data-path-end'] = esc_attr($animation['path_end']) || null;
					$animeprops['data-svgdraw'] = esc_attr($animation['svg_draw']) ? "yes" : null;
				}
				if(isset($animation['type']) && $animation['type'] == 'mouse'){
					$animeprops['data-mouse-move'] = 'yes';
					$animeprops['data-mouse-px'] = esc_attr($animation['mouse_px']) || null;
					$animeprops['data-mouse-py'] = esc_attr($animation['mouse_py']) || null;
					$animeprops['data-pos-z'] = esc_attr($animation['pos_z']) || null;
					$animeprops['data-mouse-rx'] = esc_attr($animation['mouse_rx']) || null;
					$animeprops['data-mouse-ry'] = esc_attr($animation['mouse_ry']) || null;
					$animeprops['data-mouse-rz'] = esc_attr($animation['mouse_rz']) || null;
					$animeprops['data-mouse-restore'] = esc_attr($animation['mouse_restore']) || null;
				}
			} else if (!empty($animation['type'])) {

				if(!empty($animation['onscrub'])){
					$animeprops['data-aos-scrub'] = "yes";
				}
				if(!empty($animation['onsplit'])){
					$animeprops['data-aos-split'] = "yes";
				}
				if(!empty($animation['onclass_active']) || !empty($animation['onscrub'])){
					//do not trigger on view animation
				}else{
					$animeprops['data-aos'] = esc_attr($animation['type']);
				}

				if (!empty($animation['delay'])) {
					$animeprops['data-aos-delay'] = esc_attr($animation['delay']);
				}
				if (!empty($animation['easing'])) {
					$animeprops['data-aos-easing'] = esc_attr($animation['easing']);
				}
				if (!empty($animation['duration'])) {
					$animeprops['data-aos-duration'] = esc_attr($animation['duration']);
				}
				if (!empty($animation['anchor'])) {
					$anchor = str_replace(' ', '-', esc_attr($animation['anchor']));
					$animeprops['data-aos-anchor-placement'] = $anchor;
				}
				if (!empty($animation['onlyonce'])) {
					$animeprops['data-aos-once'] = true;
				}
			}
			if ($interactionLayers && !empty($interactionLayers)) {
				$animeprops['data-gspbactions'] = htmlspecialchars(json_encode($interactionLayers));
			}
			$out = '';
			foreach ($animeprops as $key => $value) {
				$out .= ' ' . $key . '="' . $value . '"';
			}
			return $out;
		}
		return false;
	}
}

//////////////////////////////////////////////////////////////////
// Render icon for dynamic blocks
//////////////////////////////////////////////////////////////////

function greenshift_render_icon_module($attribute, $size = 20)
{

	$type = !empty($attribute['type']) ? $attribute['type'] : '';
	$icon = !empty($attribute['icon']) ? $attribute['icon'] : '';

	if ($type == 'image') {
		return '<img src="' . $icon['image']['url'] . '" alt="Image" width="' . $size . 'px" height="' . $size . 'px" />';
	} else if ($type == 'svg') {
		//return $icon['svg']; disable direct load as it's unsafe for dynamic fields
		return false;
	} else if ($type == 'font') {
		$font = str_replace('rhicon rhi-', '', $icon['font']);
		$pathicon = '';
		$widthicon = '1024';
		$iconfontsaved = get_transient('gspb-dynamic-icons-render');

		if (empty($iconfontsaved[$font])) {
			$icons = GREENSHIFT_DIR_PATH . 'libs/iconpicker/selection.json';
			$iconsfile = file_get_contents($icons); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
			$iconsdecode = json_decode($iconsfile, true);
			$iconsarray = [];
			foreach ($iconsdecode['icons'] as $key => $value) {
				$name = $value['properties']['name'];
				$path = $value['icon']['paths'];
				$width = !empty($value['icon']['width']) ? $value['icon']['width'] : '';
				if ($width) {
					$iconsarray[$name]['width'] = $width;
				}
				$iconsarray[$name]['path'] = $path;
			}

			if (is_array($iconsarray[$font])) {
				foreach ($iconsarray[$font]['path'] as $key => $value) {
					$pathicon .= '<path d="' . $value . '" />';
				}
				if (!empty($iconsarray[$font]['width'])) {
					$widthicon = $iconsarray[$font]['width'];
				}
			}
			if (empty($iconfontsaved)) $iconfontsaved = [];
			$iconfontsaved[$font]['path'] = $pathicon;
			$iconfontsaved[$font]['width'] = $widthicon;
			set_transient('gspb-dynamic-icons-render', $iconfontsaved, 180 * DAY_IN_SECONDS);
		}

		return '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 ' . $iconfontsaved[$font]['width'] . ' 1024" xmlns="http://www.w3.org/2000/svg">' . $iconfontsaved[$font]['path'] . '</svg>';
	}
}

//////////////////////////////////////////////////////////////////
// Render data attributes for dynamic blocks
//////////////////////////////////////////////////////////////////

function gspb_getDataAttributesfromDynamic($attributes) {
    $final_data = array();
    if(isset($attributes['dynamicGClasses'])) {
        $dynamicGClasses = $attributes['dynamicGClasses'];
        if($dynamicGClasses && count($dynamicGClasses) > 0) {
            foreach($dynamicGClasses as $item) {
                if($item['type'] == 'data') {
                    $data = $item['data'];
                    $value = $item['value'];
                    $final_data[$value] = $data;
                }
            }
        }
    }
    return $final_data;
}

//////////////////////////////////////////////////////////////////
// Disable Lazy load on image
//////////////////////////////////////////////////////////////////

add_filter('wp_img_tag_add_loading_attr', 'gspb_skip_lazy_load', 10, 3);
remove_filter('admin_head', 'wp_check_widget_editor_deps');

function gspb_skip_lazy_load($value, $image, $context)
{
	if (strpos($image, 'no-lazyload') !== false) $value = 'eager';
	return $value;
}

//////////////////////////////////////////////////////////////////
// Sanitize multi array
//////////////////////////////////////////////////////////////////
function greenshift_sanitize_multi_array($data)
{
	foreach ($data as $key => $value) {
		if (is_array($value)) {
			$data[$key] = greenshift_sanitize_multi_array($value);
		} else {
			$data[$key] = sanitize_text_field($value);
		}
	}
	return $data;
}

function greenshift_sanitize_id_key($id) {
	if (empty($id)) return '';
    // Remove anything that isn't a-z, A-Z, 0-9, -, _, or .
    $sanitized_id = preg_replace('/[^a-zA-Z0-9\-\_\.]/', '', $id);
    return esc_attr($sanitized_id);
}

//////////////////////////////////////////////////////////////////
// Preset Classes
//////////////////////////////////////////////////////////////////

function greenshift_render_preset_classes(){
	$options = array(
		array(
			'label' => esc_html__('Perspective Presets', 'greenshift-animation-and-page-builder-blocks'),
			'options' => apply_filters('greenshift_style_preset_classes', array(
				[
					'value'=> 'gs_style_skeuomorphism',
					'label' => "Skeuomorphism",
					'css'=> ".gs_style_skeuomorphism{background:#f5f5fa;border:0;border-radius:8px;box-shadow:-10px -10px 30px 0 #fff,10px 10px 30px 0 #1d0dca17;box-sizing:border-box;cursor:pointer;position:relative;transition:var(--gs-root-transition, all .5s ease-in-out);}.gs_style_skeuomorphism:hover{background:#f8f8ff;box-shadow:-15px -15px 30px 0 #fff,15px 15px 30px 0 #1d0dca17}",
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs_style_skeuomorphism',
							'css' => 'background:#f5f5fa;border:0;border-radius:8px;box-shadow:-10px -10px 30px 0 #fff,10px 10px 30px 0 #1d0dca17;box-sizing:border-box;cursor:pointer;position:relative;transition:var(--gs-root-transition, all .5s ease-in-out);'
						),
						array(
							'selector'     => '.gs_style_skeuomorphism:hover',
							'css' => 'background:#f8f8ff;box-shadow:-15px -15px 30px 0 #fff,15px 15px 30px 0 #1d0dca17'
						),
					),
				],
				[
					'value'=> 'gs_style_perspective',
					'label' => "Perspective and shadow",
					'css'=> ".gs_style_perspective{transform:perspective(75em) rotateX(18deg);box-shadow:rgba(22,31,39,.42) 0 60px 123px -25px,rgba(19,26,32,.08) 0 35px 75px -35px;border-radius:1rem;border: 1px solid; border-color: #d5dce2 #d5dce2 #b8c2cc}",
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs_style_perspective',
							'css' => 'transform:perspective(75em) rotateX(18deg);box-shadow:rgba(22,31,39,.42) 0 60px 123px -25px,rgba(19,26,32,.08) 0 35px 75px -35px;border-radius:1rem;border: 1px solid; border-color: #d5dce2 #d5dce2 #b8c2cc'
						),
					),
				],
				[
					'value'=> 'gs_style_rotated',
					'label' => "Perspective and rotate",
					'css'=> ".gs_style_rotated{transform:perspective(1500px) rotateY(15deg);border-radius:1rem;box-shadow:rgba(0,0,0,.25) 0 25px 50px -12px;transition:transform 1s ease 0s}.gs_style_rotated:hover{transform:perspective(3000px) rotateY(5deg)}",
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs_style_rotated',
							'css' => 'transform:perspective(1500px) rotateY(15deg);border-radius:1rem;box-shadow:rgba(0,0,0,.25) 0 25px 50px -12px;transition:transform 1s ease 0s'
						),
						array(
							'selector'     => '.gs_style_rotated:hover',
							'css' => 'transform:perspective(3000px) rotateY(5deg)'
						),
					),
				],
				[
					'value'=> 'gs_style_skewed',
					'label' => "Perspective and skew",
					'css'=> ".gs_style_skewed{transition:transform 1s ease 0s;transform:perspective(1000px) rotateX(4deg) rotateY(-16deg) rotateZ(4deg);box-shadow:24px 16px 64px 0 rgba(0,0,0,.08);border-radius:2px}.gs_style_skewed:hover{transform:rotate3d(0,0,0,0deg)}",
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs_style_skewed',
							'css' => 'transition:transform 1s ease 0s;transform:perspective(1000px) rotateX(4deg) rotateY(-16deg) rotateZ(4deg);box-shadow:24px 16px 64px 0 rgba(0,0,0,.08);border-radius:2px'
						),
						array(
							'selector'     => '.gs_style_skewed:hover',
							'css' => 'transform:rotate3d(0,0,0,0deg)'
						),
					),
				],
				[
					'value'=> 'gs_style_stacked',
					'label' => "Stacked style with hover",
					'css'=> ".gs_style_stacked{transform:rotateX(51deg) rotateZ(43deg);transform-style:preserve-3d;border-radius:32px;box-shadow:1px 1px 0 1px #f9f9fb,-1px 0 28px 0 rgba(34,33,81,.01),28px 28px 28px 0 rgba(34,33,81,.25);transition:var(--gs-root-hover-transition, all var(--gs-root-hover-timing, .5s) var(--gs-root-hover-easing, cubic-bezier(0.42, 0, 0.58, 1)))}.gs_style_stacked:hover{transform:translate3d(0,-16px,0) rotateX(51deg) rotateZ(43deg);box-shadow:1px 1px 0 1px #f9f9fb,-1px 0 28px 0 rgba(34,33,81,.01),54px 54px 28px -10px rgba(34,33,81,.15)}",
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs_style_stacked',
							'css' => 'transform:rotateX(51deg) rotateZ(43deg);transform-style:preserve-3d;border-radius:32px;box-shadow:1px 1px 0 1px #f9f9fb,-1px 0 28px 0 rgba(34,33,81,.01),28px 28px 28px 0 rgba(34,33,81,.25);transition:var(--gs-root-hover-transition, all var(--gs-root-hover-timing, .5s) var(--gs-root-hover-easing, cubic-bezier(0.42, 0, 0.58, 1)))'
						),
						array(
							'selector'     => '.gs_style_stacked:hover',
							'declarations' => array( 'transform' => 'translate3d(0,-16px,0) rotateX(51deg) rotateZ(43deg)', 'box-shadow' => '1px 1px 0 1px #f9f9fb,-1px 0 28px 0 rgba(34,33,81,.01),54px 54px 28px -10px rgba(34,33,81,.15)')
						),
					),
				],
				[
					'value'=> 'gs_style_3d_multi',
					'label' => "3d multi layered",
					'css'=> '.gs_style_3d_multi{transform:scale(.75) rotateY(-30deg) rotateX(45deg) translateZ(4.5rem);transform-origin:50% 100%;transform-style:preserve-3d;box-shadow:1rem 1rem 2rem rgba(0,0,0,.25);transition:.6s ease transform;background:white}.gs_style_3d_multi:hover{transform:scale(1)}.gs_style_3d_multi::after,.gs_style_3d_multi::before{content:"";display:block;position:absolute;top:0;left:0;width:calc(100% - 6px);height:calc(100% - 6px);transition:var(--gs-root-hover-transition, all var(--gs-root-hover-timing, .5s) var(--gs-root-hover-easing, cubic-bezier(0.42, 0, 0.58, 1)))}.gs_style_3d_multi::before{transform:translateZ(4rem);border:5px solid #f96b59}.gs_style_3d_multi::before:hover{transform:translateZ(0)}.gs_style_3d_multi::after{transform:translateZ(-4rem);background:#f96b59;box-shadow:1rem 1rem 2rem rgba(0,0,0,.25)}.gs_style_3d_multi::after:hover{transform:translateZ(-1px)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs_style_3d_multi',
							'css' => 'transform:scale(.75) rotateY(-30deg) rotateX(45deg) translateZ(4.5rem);transform-origin:50% 100%;transform-style:preserve-3d;box-shadow:1rem 1rem 2rem rgba(0,0,0,.25);transition:.6s ease transform;background:white'
						),
						array(
							'selector'     => '.gs_style_3d_multi:hover',
							'css' => 'transform:scale(1)'
						),
						array(
							'selector'     => '.gs_style_3d_multi::after,.gs_style_3d_multi::before',
							'css' => 'content:"";display:block;position:absolute;top:0;left:0;width:calc(100% - 6px);height:calc(100% - 6px);transition:var(--gs-root-hover-transition, all var(--gs-root-hover-timing, .5s) var(--gs-root-hover-easing, cubic-bezier(0.42, 0, 0.58, 1)))'
						),
						array(
							'selector'     => '.gs_style_3d_multi::before',
							'css' => 'transform:translateZ(4rem);border:5px solid #f96b59'
						),
						array(
							'selector'     => '.gs_style_3d_multi::before:hover',
							'css' => 'transform:translateZ(0)'
						),
						array(
							'selector'     => '.gs_style_3d_multi::after',
							'css' => 'transform:translateZ(-4rem);background:#f96b59;box-shadow:1rem 1rem 2rem rgba(0,0,0,.25)'
						),
						array(
							'selector'     => '.gs_style_3d_multi::after:hover',
							'css' => 'transform:translateZ(-1px)'
						),
					),
				],
			))
		),
		array(
			'label' => esc_html__('Hover Presets', 'greenshift-animation-and-page-builder-blocks'),
			'options' => apply_filters('greenshift_hover_preset_classes', array(
				[
					'value'=> 'gs_shadow_on_hover',
					'label' => "Box shadow on hover",
					'css'=> '.gs_shadow_on_hover{transition:var(--gs-root-hover-transition, all var(--gs-root-hover-timing, .5s) var(--gs-root-hover-easing, cubic-bezier(0.42, 0, 0.58, 1)));box-shadow:0 3px 1px 0 #4232460d;border:1px solid #6d00f217}.gspb-bodyfront .gs_shadow_on_hover:hover, .gspb-bodyfront .gs-parent-hover:hover .gs_shadow_on_hover{box-shadow:7px 8px 1px 0 #b8a9c238}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs_shadow_on_hover',
							'css' => 'transition:var(--gs-root-hover-transition, all var(--gs-root-hover-timing, .5s) var(--gs-root-hover-easing, cubic-bezier(0.42, 0, 0.58, 1)));box-shadow:0 3px 1px 0 #4232460d;border:1px solid #6d00f217'
						),
						array(
							'selector'     => '.gspb-bodyfront .gs_shadow_on_hover:hover, .gspb-bodyfront .gs-parent-hover:hover .gs_inter_box_hover',
							'css' => 'box-shadow:7px 8px 1px 0 #b8a9c238'
						),
					),
				],
				[
					'value'=> 'gs_top_on_hover',
					'label' => "Move to top on hover",
					'css'=> '.gs_top_on_hover{transition:var(--gs-root-hover-transition, all var(--gs-root-hover-timing, .5s) var(--gs-root-hover-easing, cubic-bezier(0.42, 0, 0.58, 1)));transform:translateY(0px);}.gspb-bodyfront .gs_top_on_hover:hover, .gspb-bodyfront .gs-parent-hover:hover .gs_top_on_hover{transform:var(--gs-root-hover-transform, translateY(-5px));}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs_top_on_hover',
							'css' => 'transition:var(--gs-root-hover-transition, all var(--gs-root-hover-timing, .5s) var(--gs-root-hover-easing, cubic-bezier(0.42, 0, 0.58, 1)));transform:translateY(0px)'
						),
						array(
							'selector'     => '.gspb-bodyfront .gs_top_on_hover:hover, .gspb-bodyfront .gs-parent-hover:hover .gs_top_on_hover',
							'css' => 'transform:var(--gs-root-hover-transform, translateY(-5px))'
						),
					),
				],
				[
					'value'=> 'gs_scale_on_hover',
					'label' => "Scale on hover",
					'css'=> '.gs_scale_on_hover{transform:scale(1);transition:var(--gs-root-hover-transition, all var(--gs-root-hover-timing, .5s) var(--gs-root-hover-easing, cubic-bezier(0.42, 0, 0.58, 1)));}.gspb-bodyfront .gs_scale_on_hover:hover, .gspb-bodyfront .gs-parent-hover:hover .gs_scale_on_hover{transform:var(--gs-root-hover-transform, scale(1.06));}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs_scale_on_hover',
							'css' => 'transform:scale(1);transition:var(--gs-root-hover-transition, all var(--gs-root-hover-timing, .5s) var(--gs-root-hover-easing, cubic-bezier(0.42, 0, 0.58, 1)))'
						),
						array(
							'selector'     => '.gspb-bodyfront .gs_scale_on_hover:hover, .gspb-bodyfront .gs-parent-hover:hover .gs_scale_on_hover',
							'css' => 'transform:var(--gs-root-hover-transform, scale(1.04))'
						),
					),
				],
				[
					'value'=> 'gs-twin-on-hover',
					'label' => "Twin slide on hover",
					'css'=> '.gs-twin-on-hover{overflow:hidden;position:relative}.gs-twin-on-hover > *{transition:var(--gs-root-motion-transition, var(--gs-root-motion-transition-property, all) var(--gs-root-motion-timing, .6s) var(--gs-root-motion-easing, cubic-bezier(0.42, 0, 0.58, 1)));display:inline-block}.gs-twin-on-hover > *:last-child{transform:translateY(120%);position:absolute;top:0;left:0;}.gspb-bodyfront .gs-twin-on-hover:hover > *:first-child, .gspb-bodyfront .gs-parent-hover:hover .gs-twin-on-hover > *:first-child{transform:translateY(-120%);}.gspb-bodyfront .gs-twin-on-hover:hover > *:last-child, .gspb-bodyfront .gs-parent-hover:hover .gs-twin-on-hover > *:last-child{transform:translateY(0);}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-twin-on-hover',
							'css' => 'overflow:hidden; position:relative'
						),
						array(
							'selector'     => '.gs-twin-on-hover > *',
							'css' => 'transition:var(--gs-root-motion-transition, var(--gs-root-motion-transition-property, all) var(--gs-root-motion-timing, .6s) var(--gs-root-motion-easing, cubic-bezier(0.42, 0, 0.58, 1)));display:inline-block'
						),
						array(
							'selector'     => '.gs-twin-on-hover > *:last-child',
							'css' => 'transform:translateY(120%);position:absolute;top:0;left:0'
						),
						array(
							'selector'     => '.gspb-bodyfront .gs-twin-on-hover:hover > *:first-child, .gspb-bodyfront .gs-parent-hover:hover .gs-twin-on-hover > *:first-child',
							'css' => 'transform:translateY(-120%)'
						),
						array(
							'selector'     => '.gspb-bodyfront .gs-twin-on-hover:hover > *:last-child, .gspb-bodyfront .gs-parent-hover:hover .gs-twin-on-hover > *:last-child',
							'css' => 'transform:translateY(0)'
						),
					),
				],
				[
					'value'=> 'gs-parent-hover',
					'label' => "Parent hover activator",
					'type'=> "preset",
				],
			))
		),
		array(
			'label' => esc_html__('Interaction Presets', 'greenshift-animation-and-page-builder-blocks'),
			'options' => apply_filters('greenshift_interaction_preset_classes', array(
				[
					'value'=> 'gs-smart-scroll',
					'label' => "Smart scroll",
					'css'=> '.gs-smart-scroll{overflow-x:scroll;overflow-y:hidden;display:flex;flex-direction:row;flex-wrap:nowrap;align-items:center;column-gap:15px;scroll-snap-type:x mandatory;scrollbar-width:thin;scrollbar-color:transparent transparent;-webkit-overflow-scrolling:touch}.gs-smart-scroll > *{flex-grow:0;flex-shrink:0;flex-basis:auto;}.gs-smart-scroll *{user-select:none;-webkit-user-drag:none}.gs-smart-scroll .wp-block-post-template{display: flex !important;overflow-x:scroll;overflow-y:hidden;scroll-snap-type:x mandatory;scrollbar-width:thin;scrollbar-color:transparent transparent;flex-direction:row;flex-wrap:nowrap;column-gap:15px;}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-smart-scroll',
							'css' => 'overflow-x:scroll;overflow-y:hidden;display:flex;flex-direction:row;flex-wrap:nowrap;align-items:center;column-gap:15px;scroll-snap-type:x mandatory;scrollbar-width:thin;scrollbar-color:transparent transparent;-webkit-overflow-scrolling:touch'
						),
						array(
							'selector'     => '.gs-smart-scroll > *',
							'css' => 'flex-grow:0;flex-shrink:0;flex-basis:auto;'
						),
						array(
							'selector'     => '.gs-smart-scroll *',
							'css' => 'user-select:none;-webkit-user-drag:none'
						),
						array(
							'selector'     => '.gs-smart-scroll .wp-block-post-template',
							'css' => 'overflow-x:scroll;overflow-y:hidden;scroll-snap-type:x mandatory;scrollbar-width:thin;scrollbar-color:transparent transparent;display:flex !important;flex-direction:row;flex-wrap:nowrap;column-gap:15px;'
						),
					),
				],
			))
		),
		array(
			'label' => esc_html__('Motion Presets', 'greenshift-animation-and-page-builder-blocks'),
			'options' => apply_filters('greenshift_motion_activator_classes', array(
				[
					'value'=> 'gs-motion-init',
					'label' => "Motion Initiator",
					'css'=> '.gs-motion-init{opacity:var(--gs-root-motion-opacity, 1);transition:var(--gs-root-motion-transition, var(--gs-root-motion-transition-property, all) var(--gs-root-motion-timing, .9s) var(--gs-root-motion-easing, cubic-bezier(0.42, 0, 0.58, 1)));clip-path: var(--gs-root-motion-clip-path, inset(0% 0% 0% 0%));transform: var(--gs-root-motion-transform, translateY(0));}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-motion-init',
							'css' => 'opacity:var(--gs-root-motion-opacity, 1);transition:var(--gs-root-motion-transition, var(--gs-root-motion-transition-property, all) var(--gs-root-motion-timing, .9s) var(--gs-root-motion-easing, cubic-bezier(0.42, 0, 0.58, 1)));clip-path: var(--gs-root-motion-clip-path, inset(0% 0% 0% 0%));transform: var(--gs-root-motion-transform, translateY(0))'
						),
					),
				],
				[
					'value'=> 'gs-motion-init-child',
					'label' => "Motion for Child Initiator",
					'css'=> '.gs-motion-init-child > *{opacity:var(--gs-root-motion-opacity, 1);transition:var(--gs-root-motion-transition, var(--gs-root-motion-transition-property, all) var(--gs-root-motion-timing, .9s) var(--gs-root-motion-easing, cubic-bezier(0.42, 0, 0.58, 1)));clip-path: var(--gs-root-motion-clip-path, inset(0% 0% 0% 0%));transform: var(--gs-root-motion-transform, translateY(0));}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-motion-init-child > *',
							'css' => 'opacity:var(--gs-root-motion-opacity, 1);transition:var(--gs-root-motion-transition, var(--gs-root-motion-transition-property, all) var(--gs-root-motion-timing, .9s) var(--gs-root-motion-easing, cubic-bezier(0.42, 0, 0.58, 1)));clip-path: var(--gs-root-motion-clip-path, inset(0% 0% 0% 0%));transform: var(--gs-root-motion-transform, translateY(0))'
						),
					),
				],
				[
					'value'=> 'gs-split-words',
					'label' => "Split Text Initiator",
					'css'=> '.gs-split-words .gs-words{display:inline-block;opacity:var(--gs-root-motion-opacity, 1);transition:var(--gs-root-motion-transition, var(--gs-root-motion-transition-property, all) var(--gs-root-motion-timing, .9s) var(--gs-root-motion-easing, cubic-bezier(0.42, 0, 0.58, 1)));clip-path: var(--gs-root-motion-clip-path, inset(0% 0% 0% 0%));transform: var(--gs-root-motion-transform, translateY(0))}.gs-split-words .gs-lines{display:block;white-space:pre-wrap;word-break:break-word;overflow:hidden;width:100%;}.gspb-inview-active .gs-words, .active .gs-words, .swiper-slide-active .gs-words{transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-split-words .gs-words',
							'css' => 'display:inline-block;opacity:var(--gs-root-motion-opacity, 1);transition:var(--gs-root-motion-transition, var(--gs-root-motion-transition-property, all) var(--gs-root-motion-timing, .9s) var(--gs-root-motion-easing, cubic-bezier(0.42, 0, 0.58, 1)));clip-path: var(--gs-root-motion-clip-path, inset(0% 0% 0% 0%));transform: var(--gs-root-motion-transform, translateY(0))'
						),
						array(
							'selector'     => '.gs-split-words .gs-lines',
							'css' => 'display:block;white-space:pre-wrap;word-break:break-word;overflow:hidden;width:100%'
						),
						array(
							'selector'     => '.gspb-inview-active .gs-words, .active .gs-words, .swiper-slide-active .gs-words',
							'css' => 'transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%)'
						),
					),
				],
				[
					'value'=> 'gs-motion-onclass',
					'label' => "Activator for .active class",
					'css'=> '.active .gs-motion-onclass, .swiper-slide-active .gs-motion-onclass{transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%);}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.active .gs-motion-onclass, .swiper-slide-active .gs-motion-onclass',
							'css' => 'transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%)'
						),
					),
				],
				[
					'value'=> 'gs-motion-onclass-child',
					'label' => "Activator for .active class on child",
					'css'=> '.active .gs-motion-onclass-child > *, .swiper-slide-active .gs-motion-onclass-child > *{transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%);}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.active .gs-motion-onclass-child > *, .swiper-slide-active .gs-motion-onclass-child > *',
							'css' => 'transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%)'
						),
					),
				],
				[
					'value'=> 'gs-motion-inview',
					'label' => "Activator when in view",
					'css'=> '.gs-motion-inview.gspb-inview-active{transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%);}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-motion-inview.gspb-inview-active',
							'css' => 'transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%)'
						),
					),
				],
				[
					'value'=> 'gs-motion-inview-child',
					'label' => "Activator when in view on child",
					'css'=> '.gs-motion-inview-child > *.gspb-inview-active{transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%);}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-motion-inview-child > *.gspb-inview-active',
							'css' => 'transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%)'
						),
					),
				],
				[
					'value'=> 'gs-motion-onhover',
					'label' => "Activator for :hover",
					'css'=> '.gs-motion-onhover:hover, .gs-parent-hover:hover .gs-motion-onhover{transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%);}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-motion-onhover:hover, .gs-parent-hover:hover .gs-motion-onhover',
							'css' => 'transform:translateY(0) translateZ(0) translateX(0) scale(1) skewX(0deg) skewY(0deg) rotateX(0deg) rotateY(0deg) rotateZ(0deg);opacity:1; clip-path: inset(0% 0% 0% 0%)'
						),
					),
				],
				[
					'value'=> 'gs-motion-onscrub',
					'label' => "Activator for scroll scrub",
					'css'=> '.gs-motion-onscrub{transition:transform .3s ease-out, opacity .3s ease-out, clip-path .5s ease-out;will-change: transform, opacity; }',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-motion-onscrub',
							'css' => 'transition:transform .3s ease-out, opacity .3s ease-out, clip-path .5s ease-out;will-change: transform, opacity;'
						),
					),
				],
				[
					'value'=> 'gs-motion-child-delay',
					'label' => "Transition stagger delay for child",
					'css'=> '.gs-motion-child-delay > *:first-child{transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 0))} .gs-motion-child-delay > *:nth-child(2){transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 1))} .gs-motion-child-delay > *:nth-child(3){transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 2))} .gs-motion-child-delay > *:nth-child(4){transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 3))} .gs-motion-child-delay > *:nth-child(5){transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 4))} .gs-motion-child-delay > *:nth-child(6){transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 5))} .gs-motion-child-delay > *:nth-child(7){transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 6))} .gs-motion-child-delay > *:nth-child(8){transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 7))} .gs-motion-child-delay > *:nth-child(9){transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 8))} .gs-motion-child-delay > *:nth-child(n+10){transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 9))}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-motion-child-delay > *:first-child',
							'css' => 'transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 1))'
						),
						array(
							'selector'     => '.gs-motion-child-delay > *:nth-child(2)',
							'css' => 'transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 2))'
						),	
						array(
							'selector'     => '.gs-motion-child-delay > *:nth-child(3)',
							'css' => 'transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 3))'
						),
						array(
							'selector'     => '.gs-motion-child-delay > *:nth-child(4)',
							'css' => 'transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 4))'
						),	
						array(
							'selector'     => '.gs-motion-child-delay > *:nth-child(5)',
							'css' => 'transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 5))'
						),
						array(
							'selector'     => '.gs-motion-child-delay > *:nth-child(6)',
							'css' => 'transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 6))'
						),	
						array(
							'selector'     => '.gs-motion-child-delay > *:nth-child(7)',
							'css' => 'transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 7))'
						),
						array(
							'selector'     => '.gs-motion-child-delay > *:nth-child(8)',
							'css' => 'transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 8))'
						),			
						array(
							'selector'     => '.gs-motion-child-delay > *:nth-child(9)',
							'css' => 'transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 9))'
						),
						array(
							'selector'     => '.gs-motion-child-delay > *:nth-child(n+10)',
							'css' => 'transition-delay: calc(var(--gs-root-transition-delay, .3s) + calc(var(--gs-root-transition-delay-multiplier, .1s) * 10))'
						),
					),
				],
				[		
					'value'=> 'gs-power-easing',
					'label' => "Power Easing",
					'css'=> '.gs-power-easing{--gs-root-motion-easing: cubic-bezier(0.84,0,0.16,1)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-power-easing',
							'css' => '--gs-root-motion-easing: cubic-bezier(0.84,0,0.16,1)'
						),
					),
				],
				[		
					'value'=> 'gs-expo-out-easing',
					'label' => "Expo Out Easing",
					'css'=> '.gs-expo-out-easing{--gs-root-motion-easing: cubic-bezier(0.14,1,0.34,1)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-expo-out-easing',
							'css' => '--gs-root-motion-easing: cubic-bezier(0.14,1,0.34,1)'
						),
					),
				],
				[		
					'value'=> 'gs-motion-timing-fast',
					'label' => "Motion timing fast",
					'css'=> '.gs-motion-timing-fast{--gs-root-motion-timing: 0.45s}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-motion-timing-fast',
							'css' => '--gs-root-motion-timing: 0.45s'
						),
					),
				],
				[		
					'value'=> 'gs-motion-timing-slow',
					'label' => "Motion timing slow",
					'css'=> '.gs-motion-timing-slow{--gs-root-motion-timing: 1.4s}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gs-motion-timing-slow',
							'css' => '--gs-root-motion-timing: 1.4s'
						),
					),
				],
			))
		),
		array(
			'label' => esc_html__('Motion Presets', 'greenshift-animation-and-page-builder-blocks'),
			'options' => apply_filters('greenshift_motion_preset_classes', array(
				[
					'value'=> 'gs-move-top',
					'label' => "Transition to top",
					'css'=> '.gspb-bodyfront .gs-move-top{--gs-root-motion-transform: translateY(calc(max(30px, 10%)))}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-top',
							'css' => '--gs-root-motion-transform: translateY(calc(max(30px, 10%)))'
						),
					),
				],
				[
					'value'=> 'gs-move-top-full',
					'label' => "Transition to top full",
					'css'=> '.gspb-bodyfront .gs-move-top-full{--gs-root-motion-transform: translateY(110%)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-top-full',
							'css' => '--gs-root-motion-transform: translateY(110%)'
						),
					),
				],
				[
					'value'=> 'gs-move-right',
					'label' => "Transition to right",
					'css'=> '.gspb-bodyfront .gs-move-right{--gs-root-motion-transform: translateX(calc(max(30px, 10%) * -1))}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-right',
							'css' => '--gs-root-motion-transform: translateX(calc(max(30px, 10%) * -1))'
						),
					),
				],
				[
					'value'=> 'gs-move-right-full',
					'label' => "Transition to right Full",
					'css'=> '.gspb-bodyfront .gs-move-right-full{--gs-root-motion-transform: translateX(-110%)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-right-full',
							'css' => '--gs-root-motion-transform: translateX(-110%)'
						),
					),
				],
				[
					'value'=> 'gs-move-left',
					'label' => "Transition to left",
					'css'=> '.gspb-bodyfront .gs-move-left{--gs-root-motion-transform: translateX(calc(max(30px, 10%) * 1))}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-left',
							'css' => '--gs-root-motion-transform: translateX(calc(max(30px, 10%) * 1))'
						),
					),
				],
				[
					'value'=> 'gs-move-bottom',
					'label' => "Transition to bottom",
					'css'=> '.gspb-bodyfront .gs-move-bottom{--gs-root-motion-transform: translateY(calc(max(30px, 10%) * -1))}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-bottom',
							'css' => '--gs-root-motion-transform: translateY(calc(max(30px, 10%) * -1))'
						),
					),
				],
				[
					'value'=> 'gs-scale-up',
					'label' => "Transition scale up",
					'css'=> '.gspb-bodyfront .gs-scale-up{--gs-root-motion-transform: scale(0.5)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-scale-up',
							'css' => '--gs-root-motion-transform: scale(0.5)'
						),
					),
				],
				[
					'value'=> 'gs-move-opacity',
					'label' => "Transition for opacity",
					'css'=> '.gspb-bodyfront .gs-move-opacity{--gs-root-motion-opacity: 0}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-opacity',
							'css' => '--gs-root-motion-opacity: 0'
						),
					),
				],
				[
					'value'=> 'gs-move-clip-top',
					'label' => "Transition clip top",
					'css'=> '.gspb-bodyfront .gs-move-clip-top{--gs-root-motion-clip-path: inset(0% 0% 100% 0%)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-clip-top',
							'css' => '--gs-root-motion-clip-path: inset(0% 0% 100% 0%)'
						),
					),
				],
				[
					'value'=> 'gs-move-clip-bottom',
					'label' => "Transition clip bottom",
					'css'=> '.gspb-bodyfront .gs-move-clip-bottom{--gs-root-motion-clip-path: inset(100% 0% 0% 0%)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-clip-bottom',
							'css' => '--gs-root-motion-clip-path: inset(100% 0% 0% 0%)'
						),
					),
				],
				[
					'value'=> 'gs-move-clip-left',
					'label' => "Transition clip left",
					'css'=> '.gspb-bodyfront .gs-move-clip-left{--gs-root-motion-clip-path: inset(0% 100% 0% 0%)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-clip-left',
							'css' => '--gs-root-motion-clip-path: inset(0% 100% 0% 0%)'
						),
					),
				],
				[		
					'value'=> 'gs-move-clip-right',
					'label' => "Transition clip right",
					'css'=> '.gspb-bodyfront .gs-move-clip-right{--gs-root-motion-clip-path: inset(0% 0% 0% 100%)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-clip-right',
							'css' => '--gs-root-motion-clip-path: inset(0% 0% 0% 100%)'
						),
					),
				],
				[
					'value'=> 'gs-move-top-flip',
					'label' => "Transition to top and flip",
					'css'=> '.gspb-bodyfront .gs-move-top-flip{--gs-root-motion-transform: translateY(0.2em) rotateX(40deg)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-move-top-flip',
							'css' => '--gs-root-motion-transform: translateY(10%) rotateX(40deg)'
						),
					),
				],
				[		
					'value'=> 'gs-rotate-x',
					'label' => "Transition Rotate X",
					'css'=> '.gspb-bodyfront .gs-rotate-x{--gs-root-motion-transform: rotateX(40deg)}',
					'type'=> "preset",
					'style_store' => array(	
						array(
							'selector'     => '.gspb-bodyfront .gs-rotate-x',
							'css' => '--gs-root-motion-transform: rotateX(40deg)'
						),
					),
				],
			))
		),
		array(
			'label' => esc_html__('Spacing Presets', 'greenshift-animation-and-page-builder-blocks'),
			'options' => apply_filters('greenshift_spacing_preset_classes', array(
				[
					'value'=> 'gs_padding_s',
					'label' => "Padding Small",
					'css'=> ".gs_padding_s{padding: 0.67rem;}",
					'type'=> "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_padding_s',
							'css' => 'padding: 0.67rem'
						),
					),
				],
				[
					'value'=> 'gs_padding_m',
					'label' => "Padding Medium",
					'css'=> ".gs_padding_m{padding: 1.2rem;}",
					'type'=> "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_padding_m',
							'css' => 'padding: 1.2rem'
						),
					),
				],
				[
					'value'=> 'gs_padding_l',
					'label' => "Padding Large",
					'css'=> ".gs_padding_l{padding: 2rem;}",
					'type'=> "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_padding_l',
							'css' => 'padding: 2rem'
						),
					),
				],
				[
					'value'=> 'gs_padding_xl',
					'label' => "Padding X Large",
					'css'=> ".gs_padding_xl{padding: 3rem;}",
					'type'=> "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_padding_xl',
							'css' => 'padding: 3rem'
						),
					),
				],
				[
					'value'=> 'gs-overflow-hidden',
					'label' => "Overflow hidden",
					'css'=> ".gs-overflow-hidden{overflow: hidden;}",
					'type'=> "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs-overflow-hidden',
							'css' => 'overflow: hidden'
						),
					),
				]
			))
		),
		array(
			'label' => esc_html__('Shadow Presets', 'greenshift-animation-and-page-builder-blocks'),
			'options' => apply_filters('greenshift_shadow_preset_classes',array(
				[
					'value'=> 'gs_shadow_elegant',
					'label'=> "Shadow Elegant",
					'css'=> ".gs_shadow_elegant{box-shadow: rgba(0, 0, 0, 0.1) -4px 9px 25px -6px;}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_shadow_elegant',
							'css' => 'box-shadow: rgba(0, 0, 0, 0.1) -4px 9px 25px -6px'
						),
					),
				],
				[
					'value'=> 'gs_shadow_border',
					'label'=> "Shadow as border",
					'css'=> ".gs_shadow_border{box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_shadow_border',
							'css' => 'box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px'
						),
					),
				],
				[
					'value'=> 'gs_shadow_highlight',
					'label'=> "Shadow Highlight",
					'css'=> ".gs_shadow_highlight{box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_shadow_highlight',
							'css' => 'box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px'
						),
					),
				],
				[
					'value'=> 'gs_shadow_accent',
					'label'=> "Shadow Accent",
					'css'=> ".gs_shadow_accent{box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_shadow_accent',
							'css' => 'box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px'
						),
					),
				],
				[
					'value'=> 'gs_shadow_xbottom',
					'label'=> "Shadow Accent Bottom",
					'css'=> ".gs_shadow_xbottom{box-shadow: rgb(0 0 0 / 6%) 0px 60px 40px -7px}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_shadow_xbottom',
							'css' => 'box-shadow: rgb(0 0 0 / 6%) 0px 60px 40px -7px'
						),
					),
				],
			))
		),
		array(
			'label' => esc_html__('Border Presets', 'greenshift-animation-and-page-builder-blocks'),
			'options' => apply_filters('greenshift_border_preset_classes',array(
				[
					'value'=> 'gs_border_elegant',
					'label'=> "Border Elegant",
					'css'=> ".gs_border_elegant{border:1px solid #00000012}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_border_elegant',
							'css' => 'border: 1px solid #00000012'
						),
					),
				],
				[
					'value'=> 'gs_border_radius_s',
					'label'=> "Small border radius",
					'css'=> ".gs_border_radius_s{border-radius: 5px}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_border_radius_s',
							'css' => 'border-radius: 5px'
						),
					),
				],
				[
					'value'=> 'gs_inter_toon_border',
					'label' => "Toon Border",
					'css'=> '.gs_inter_toon_border{text-decoration:none;text-transform:uppercase;color:#000;cursor:pointer;border:3px solid;box-shadow:1px 1px 0 0,2px 2px 0 0,3px 3px 0 0,4px 4px 0 0,5px 5px 0 0;position:relative;user-select:none;-webkit-user-select:none;touch-action:manipulation}.gs_inter_toon_border:active{box-shadow:0 0;top:5px;left:5px}',
					'type'=> "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_inter_toon_border',
							'css' => 'text-decoration: none; text-transform: uppercase; color: #000; cursor: pointer; border: 3px solid; box-shadow: 1px 1px 0 0,2px 2px 0 0,3px 3px 0 0,4px 4px 0 0,5px 5px 0 0; position: relative; user-select: none; -webkit-user-select: none; touch-action: manipulation'
						),
						array(
							'selector'     => '.gs_inter_toon_border:active',
							'css' => 'box-shadow: 0 0; top: 5px; left: 5px'
						),
					),
				],
				[
					'value'=> 'gs_border_radius_m',
					'label'=> "Middle border radius",
					'css'=> ".gs_border_radius_m{border-radius: 15px}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_border_radius_m',
							'css' => 'border-radius: 15px'
						),
					),
				],
				[
					'value'=> 'gs_border_radius_l',
					'label'=> "Large border radius",
					'css'=> ".gs_border_radius_l{border-radius: 30px}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_border_radius_l',
							'css' => 'border-radius: 30px'
						),
					),
				],
				[
					'value'=> 'gs_border_round',
					'label'=> "Rounded corners",
					'css'=> ".gs_border_round{border-radius: 50%}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_border_round',
							'css' => 'border-radius: 50%'
						),
					),
				],

			))
		),
		array(
			'label' => esc_html__('Background Presets', 'greenshift-animation-and-page-builder-blocks'),
			'options' => apply_filters('greenshift_background_preset_classes',array(
				[
					'value'=> 'gs_bg_gradient_fluid',
					'label'=> "Colored Animated background",
					'css'=> ".gs_bg_gradient_fluid{background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);background-size: 400% 400%;animation: gsbackgroundanimation 15s ease infinite;}@keyframes gsbackgroundanimation{0% {	background-position: 0% 50%;}50% {background-position: 100% 50%;}100% {background-position: 0% 50%;}}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_bg_gradient_fluid',
							'css' => 'background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab); background-size: 400% 400%; animation: gsbackgroundanimation 15s ease infinite'
						),
						array(
							'selector'     => '@keyframes gsbackgroundanimation',
							'css' => '0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; }'
						),
					),
				]
			))
		),
		array(
			'label' => esc_html__('Opacity Presets', 'greenshift-animation-and-page-builder-blocks'),
			'options' => apply_filters('greenshift_background_preset_classes',array(
				[
					'value'=> 'hide_onfront',
					'label'=> "0% opacity on Frontend",
					'css'=> ".gspb-bodyfront .hide_onfront{opacity:0}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gspb-bodyfront .hide_onfront',
							'css' => 'opacity: 0'
						),
					),
				],
				[
					'value'=> 'gs_opacity_30',
					'label'=> "30% opacity",
					'css'=> ".gs_opacity_30{opacity:0.3}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_opacity_30',
							'css' => 'opacity: 0.3'
						),
					),
				],
				[
					'value'=> 'gs_opacity_50',
					'label'=> "Half opacity",
					'css'=> ".gs_opacity_50{opacity:0.5}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_opacity_50',
							'css' => 'opacity: 0.5'
						),
					),
				],
				[
					'value'=> 'gs_opacity_75',
					'label'=> "75% opacity",
					'css'=> ".gs_opacity_75{opacity:0.75}",
					'type' => "preset",
					'style_store' => array(
						array(
							'selector'     => '.gs_opacity_75',
							'css' => 'opacity: 0.75'
						),
					),
				]
			))
		),
		array(
			'label' => esc_html__('Data attributes', 'greenshift-animation-and-page-builder-blocks'),
			'options' => apply_filters('greenshift_data_preset_classes',array(
				[
					'value'=> 'data-swiper-parallax',
					'label'=> "Slider parallax",
					'type' => "data",
					'data' => "30%"
				],
				[
					'value'=> 'data-swiper-parallax-x',
					'label'=> "Slider parallax X",
					'type' => "data",
					'data' => "-800"
				],
				[
					'value'=> 'data-swiper-parallax-y',
					'label'=> "Slider parallax Y",
					'type' => "data",
					'data' => "-300"
				],
				[
					'value'=> 'data-swiper-parallax-scale',
					'label'=> "Slider parallax scale",
					'type' => "data",
					'data' => "0.5"
				],
				[
					'value'=> 'data-swiper-parallax-opacity',
					'label'=> "Slider parallax opacity",
					'type' => "data",
					'data' => "0.3"
				],
				[
					'value'=> 'data-swiper-parallax-duration',
					'label'=> "Slider parallax duration",
					'type' => "data",
					'data' => "1200"
				],
				[
					'value'=> 'tabindex',
					'label'=> "Focusable attribute",
					'type' => "data",
					'data' => "0"
				],
			))
		)
	);
	$custom_options = [];
	$custom_options = apply_filters('greenshift_preset_classes', $custom_options);
	if(!empty($custom_options)){
		$options = array_merge($options, $custom_options);
	}

	return $options;
}

function greenshift_get_style_from_class_array($value, $type = 'preset'){
	$css = '';
	if($type == 'preset'){
		$presets = greenshift_render_preset_classes();
		if(!empty($presets)){
			$common = [];
			foreach($presets as $preset){
				if(!empty($preset['options'])){
					$common = array_merge($common, $preset['options']);
				}
			}
			if(!empty($common)){
				foreach($common as $key => $option){
					if(!empty($option['value']) && !empty($option['css']) && $option['value'] == $value){
						// if(!empty($option['style_store'])){
						// 	foreach ($option['style_store'] as $style) {
						// 		$styleStore = GreenShiftStyleStore::getInstance();
						// 		if(!empty($style['css'])){
						// 			$styletocopy = $style['css'];
						// 			$styleStore->addStyle($style['selector'], $styletocopy);
						// 		}
						// 	}
						// }
						// else{
						// 	$css = $option['css'];
						// }
						$css = $option['css'];
						if($value == 'gs-motion-inview' || $value == 'gs-motion-inview-child'){
							wp_enqueue_script('greenshift-inview');
						}
						if($value == 'gs-twin-on-hover'){
							wp_enqueue_script('greenshift-twin-slide');
						}
						if($value == 'gs-split-words'){
							wp_enqueue_script('greenshift-split-text');
						}
						if($value == 'gs-motion-onscrub'){
							wp_enqueue_script('greenshift-scroll-scrub');
						}
					}
				}
			}
		}
	}else if($type == 'global'){
		$gs_settings = get_option('gspb_global_settings');
		if(!empty($gs_settings['global_classes'])){
			foreach($gs_settings['global_classes'] as $key => $option){
				if(!empty($option['value']) && !empty($option['css']) && $option['value'] == $value){
					// $styleStore = GreenShiftStyleStore::getInstance();
					// $styletocopy = $option['css'];
					// $styletocopy = gspb_get_final_css($styletocopy);
					// $styletocopy = htmlspecialchars_decode($styletocopy);
					// $styleStore->addClassStyle($value, $styletocopy);
					$css = $option['css'];
				}
				if(!empty($option['selectors'])){
					foreach($option['selectors'] as $selector){
						if(!empty($selector['css'])){
							// $styleStore = GreenShiftStyleStore::getInstance();
							// $styletocopy = $selector['css'];
							// $styletocopy = gspb_get_final_css($styletocopy);
							// $styletocopy = htmlspecialchars_decode($styletocopy);
							// $styleStore->addClassStyle($value.$selector['value'], $styletocopy);
							$css .= $selector['css'];
						}
					}
				}
			}
		}
	}
	return $css;
}

//////////////////////////////////////////////////////////////////
// Preset Variables
//////////////////////////////////////////////////////////////////
function greenshift_render_variables($variables){
	return apply_filters('greenshift_global_variables', $variables);
}


//////////////////////////////////////////////////////////////////
// Get WP fonts
//////////////////////////////////////////////////////////////////

function greenshift_get_wp_local_fonts(){
	$fonts = [];
	$query = get_posts(
		array(
			'post_type'              => 'wp_font_face',
			'posts_per_page'         => 99,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
		)
	);
	if(!empty($query)){
		foreach($query as $font){
			$font_content = json_decode($font->post_content, true);
			if($font_content['fontFamily']){
				if(!in_array($font_content['fontFamily'], $fonts)){
					$fonts[] = $font_content['fontFamily'];
				}
			}
		}
		
	}
	return $fonts;
}


//////////////////////////////////////////////////////////////////
// Split text content
//////////////////////////////////////////////////////////////////
function greenshift_split_dynamic_text($content, $type = 'word') {
    // Find the highest index before <dynamictext>
    $class_type = $type === 'word' ? 'gs_split_word' : 'gs_split_symbol';
    preg_match_all('/gs-split-index-(\d+)/', $content, $matches);
    $last_index = !empty($matches[1]) ? max($matches[1]) : -1;

    $pattern = '/<dynamictext>(.*?)<\/dynamictext>/s';
    
    return preg_replace_callback($pattern, function($matches) use ($type, $last_index, $class_type) {
        $text = $matches[1];
        
        if ($type === 'word') {
            $parts = preg_split('/(\s+)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
        } else {
            $parts = str_split($text);
        }
        
        $output = '';
        foreach ($parts as $part) {
            if (trim($part) !== '') {
                $last_index++;
                $output .= '<span class="' . $class_type . ' gs-split-index-' . $last_index . '">' . esc_html($part) . '</span>';
            } else {
                $output .= $part; // This preserves spaces
            }
        }
        
        return $output;
    }, $content);
}


//////////////////////////////////////////////////////////////////
// Generate Repeater
//////////////////////////////////////////////////////////////////

function GSPB_generate_dynamic_repeater($html, $block){
	if(class_exists('greenshiftquery\Blocks\RepeaterQuery')){
		$settings = $block['attrs'];

		//Default attributes
		if(!isset($settings['animation'])) $settings['animation'] = [];
		if(!isset($settings['limit'])) $settings['limit'] = null;
		if(!isset($settings['sourceType'])) $settings['sourceType'] = 'latest_item';
		if(!isset($settings['repeaterType'])) $settings['repeaterType'] = 'acf';
		if(!isset($settings['postId'])) $settings['postId'] = 0;
		if(!isset($settings['post_type'])) $settings['post_type'] = 'post';
		if(!isset($settings['dynamicField'])) $settings['dynamicField'] = '';
		if(!isset($settings['repeaterField'])) $settings['repeaterField'] = '';
		if(!isset($settings['taxonomy'])) $settings['taxonomy'] = 'category';
		if(!isset($settings['align'])) $settings['align'] = '';
		if(!isset($settings['tag'])) $settings['tag'] = 'div';
		if(!isset($settings['anchor'])) $settings['anchor'] = null;
		if(!isset($settings['localId'])) $settings['localId'] = null;
		if(!isset($settings['extra_filters'])) $settings['extra_filters'] = [];
		if(!isset($settings['container_link'])) $settings['container_link'] = false;
		if(!isset($settings['linkNewWindow'])) $settings['linkNewWindow'] = false;
		if(!isset($settings['linkNoFollow'])) $settings['linkNoFollow'] = false;
		if(!isset($settings['linkSponsored'])) $settings['linkSponsored'] = false;
		if(!isset($settings['linkTitleField'])) $settings['linkTitleField'] = '';
		if(!isset($settings['linkTypeField'])) $settings['linkTypeField'] = '';

		$output = '';
		$repeater = new \greenshiftquery\Blocks\RepeaterQuery;
		$output .= $repeater->gspb_grid_constructor($settings, $html, $block, false);
		return $output;
	}
	return $html;
}

//////////////////////////////////////////////////////////////////