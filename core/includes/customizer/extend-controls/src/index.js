import { responsiveCore } from './core/control';
import { responsiveSortable } from './sortable/control';
import { responsiveSlider } from './slider/control';
import { responsiveText } from './text/control';
import { responsiveHeading } from './heading/control';
import { responsiveSelect } from './select/control';
import { responsiveCheckbox } from './checkbox/control';
import { responsivePalette } from './palette/control';
import { responsiveTypography } from './typography/control';
import { responsiveDimensions } from './dimensions/control';
import { responsiveColor } from './color/control';
import { responsiveRedirect} from './redirect/control';
import { responsiveSelectButton } from './selectbtn/control';
import { responsiveTabs } from './tabs/control';
import { responsiveImageRadioButton } from './imageradiobtn/control';
import { responsiveRadiusDimensions } from './radiusdimensions/control';
import { responsiveBorderWidthDimensions } from './borderwidth/control';
import { responsiveToggle } from './toggle/control';
import { responsiveHorizontalSeparator } from './horizontal-separator/control';
import { responsiveBackgroundImage } from './backgroundimage/control';
import { responsiveTypographyGroup } from './typography_group/control';
import './breadcrumb-toggle';

wp.customize.controlConstructor['responsive-sortable'] = responsiveSortable;
wp.customize.controlConstructor['responsive-range'] = responsiveSlider;
wp.customize.controlConstructor['responsive-text'] = responsiveText; 
wp.customize.controlConstructor['responsive-heading'] = responsiveHeading;
wp.customize.controlConstructor['responsive-select'] = responsiveSelect;
wp.customize.controlConstructor['responsive-checkbox'] = responsiveCheckbox;
wp.customize.controlConstructor['responsive-palette'] = responsivePalette;
wp.customize.controlConstructor['responsive-typography'] = responsiveTypography;
wp.customize.controlConstructor['responsive-dimensions'] = responsiveDimensions;
wp.customize.controlConstructor['alpha-color'] = responsiveColor;
wp.customize.controlConstructor['responsive-redirect'] = responsiveRedirect;
wp.customize.controlConstructor['responsive-selectbtn'] = responsiveSelectButton;
wp.customize.controlConstructor['responsive-tabs'] = responsiveTabs;
wp.customize.controlConstructor['responsive-imageradiobtn'] = responsiveImageRadioButton;
wp.customize.controlConstructor['responsive-radiusdimensions'] = responsiveRadiusDimensions;
wp.customize.controlConstructor['responsive-border-width-dimensions'] = responsiveBorderWidthDimensions;
wp.customize.controlConstructor['responsive-toggle'] = responsiveToggle;
wp.customize.controlConstructor['responsive-horizontal-separator'] = responsiveHorizontalSeparator;
wp.customize.controlConstructor['responsive-background-image'] = responsiveBackgroundImage;
wp.customize.controlConstructor['responsive-typography-settings-group'] = responsiveTypographyGroup;