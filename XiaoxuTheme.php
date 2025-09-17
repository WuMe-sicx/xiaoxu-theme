<?php

namespace Themes\Xiaoxu;

use App\Contracts\ThemeAbstract;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class XiaoxuTheme extends ThemeAbstract
{
    public string $id = 'xiaoxu';

    public string $name = 'xiaoxu';

    public ?string $description = '此xiaoxu主题使用 Vue3 + Vite + NativeUI 开发的前后端分离主题。';

    public string $author = 'xiaoxu';

    public string $version = '1.0.0';

    public ?string $url = '';

    public function routes(): void
    {
        Route::any('/{any}', fn (): View => view("{$this->id}::index"))->where('any', '^(?!api).*');
    }

    public function configurable(): array
    {
        return [
            Tabs::make()->schema([
                Tabs\Tab::make('基础设置')->schema([
                    Grid::make()->schema([
                        $this->getSiteTitleFormField(),
                        $this->getSiteSubtitleFormField(),
                    ]),
                    $this->getSiteIconUrlFormField(),
                    $this->getSiteKeywordsFormField(),
                    $this->getSiteDescriptionFormField(),
                    $this->getSiteHomepageTitleFormField(),
                    $this->getSiteHomepageDescriptionFormField(),
                    $this->getSiteNoticeFormField(),
                    $this->getSiteUserLoginTypesFormField(),
                ]),
                Tabs\Tab::make('背景设置')->schema([
                    $this->getSiteHomepageBackgroundImageUrlFormField(),
                    $this->getSiteAuthPageBackgroundImageUrlFormField(),
                    $this->getSiteHomepageBackgroundImagesFormField(),
                    $this->getSiteAuthPageBackgroundImagesFormField(),
                ]),
                Tabs\Tab::make('模块控制')->schema([
                    $this->getProductFeaturesModuleField(),
                    $this->getProductAdvantagesModuleField(),
                    $this->getUserGalleryModuleField(),
                    $this->getPricingPlansModuleField(),
                ]),
                Tabs\Tab::make('友情链接')->schema([
                    $this->getFriendlyLinksFormField(),
                ]),
                Tabs\Tab::make('高级设置')->schema([
                    $this->getSiteCustomCssFormField(),
                    $this->getSiteCustomJsFormField(),
                ]),
            ])
        ];
    }

    public function casts(): array
    {
        return [
            // 使用传统的数组转换，在 boot 方法中处理特殊逻辑
        ];
    }

    /**
     * 获取首页背景图片 - 转换为完整URL
     */
    public function getHomepageBackgroundImagesAttribute($value)
    {
        if (is_array($value)) {
            $result = [];
            foreach ($value as $path) {
                $result[] = $this->convertToFullUrl($path);
            }
            return $result;
        }
        return [];
    }

    /**
     * 获取授权页背景图片 - 转换为完整URL
     */
    public function getAuthPageBackgroundImagesAttribute($value)
    {
        if (is_array($value)) {
            $result = [];
            foreach ($value as $path) {
                $result[] = $this->convertToFullUrl($path);
            }
            return $result;
        }
        return [];
    }


    /**
     * 网站标题
     */
    protected function getSiteTitleFormField(): TextInput
    {
        return TextInput::make('payload.title')
            ->label('网站标题')
            ->maxLength(60)
            ->minLength(1)
            ->required()
            ->placeholder('请输入网站标题');
    }

    /**
     * 网站副标题
     */
    protected function getSiteSubtitleFormField(): TextInput
    {
        return TextInput::make('payload.subtitle')
            ->label('网站副标题')
            ->maxLength(60)
            ->placeholder('请输入网站副标题');
    }

    /**
     * 网站图标地址
     */
    protected function getSiteIconUrlFormField(): TextInput
    {
        return TextInput::make('payload.icon_url')
            ->label('网站图标地址')
            ->placeholder('请输入网站图标URL地址');
    }

    /**
     * 网站关键字
     */
    protected function getSiteKeywordsFormField(): TextInput
    {
        return TextInput::make('payload.keywords')
            ->label('网站关键字')
            ->maxLength(255)
            ->placeholder('请输入网站关键字，用英文逗号分隔');
    }

    /**
     * 网站描述
     */
    protected function getSiteDescriptionFormField(): Textarea
    {
        return Textarea::make('payload.description')
            ->label('网站描述')
            ->maxLength(500)
            ->placeholder('请输入网站描述，用于搜索引擎优化');
    }

    /**
     * 首页横幅标题
     */
    protected function getSiteHomepageTitleFormField(): TextInput
    {
        return TextInput::make('payload.homepage_title')
            ->label('首页横幅标题')
            ->maxLength(60)
            ->placeholder('请输入首页横幅标题');
    }

    /**
     * 首页横幅描述
     */
    protected function getSiteHomepageDescriptionFormField(): Textarea
    {
        return Textarea::make('payload.homepage_description')
            ->label('首页横幅描述')
            ->maxLength(400)
            ->placeholder('请输入首页横幅描述');
    }

    /**
     * 弹出公告
     */
    protected function getSiteNoticeFormField(): MarkdownEditor
    {
        return MarkdownEditor::make('payload.notice')
            ->label('弹出公告')
            ->placeholder('支持Markdown语法，留空则不显示公告');
    }

    /**
     * 登录方式
     */
    protected function getSiteUserLoginTypesFormField(): CheckboxList
    {
        return CheckboxList::make('payload.user_login_types')
            ->label('用户登录方式')
            ->options([
                'email' => '邮箱',
                'phone' => '手机号',
                'username' => '用户名'
            ]);
    }

    /**
     * 首页背景图地址
     */
    protected function getSiteHomepageBackgroundImageUrlFormField(): TextInput
    {
        return TextInput::make('payload.homepage_background_image_url')
            ->label('首页背景图地址')
            ->url()
            ->placeholder('请输入首页背景图URL地址');
    }

    /**
     * 授权页背景图地址
     */
    protected function getSiteAuthPageBackgroundImageUrlFormField(): TextInput
    {
        return TextInput::make('payload.auth_page_background_image_url')
            ->label('授权页背景图地址')
            ->url()
            ->placeholder('请输入授权页背景图URL地址');
    }

    /**
     * 首页背景图
     */
    protected function getSiteHomepageBackgroundImagesFormField(): FileUpload
    {
        return FileUpload::make('payload.homepage_background_images')
            ->label('首页背景图')
            ->multiple()
            ->image()
            ->imageEditor()
            ->placeholder('上传首页背景图片');
    }

    /**
     * 授权页背景图地址
     */
    protected function getSiteAuthPageBackgroundImagesFormField(): FileUpload
    {
        return FileUpload::make('payload.auth_page_background_images')
            ->label('授权页背景图')
            ->multiple()
            ->image()
            ->imageEditor()
            ->placeholder('上传授权页背景图片');
    }

    /**
     * 自定义CSS
     */
    protected function getSiteCustomCssFormField(): CodeEditor
    {
        return CodeEditor::make('payload.custom_css')
            ->label('自定义CSS')
            ->helperText('在这里输入你的自定义CSS代码')
            ->language(CodeEditor\Enums\Language::Css)
            ->columnSpanFull();
    }

    /**
     * 自定义JavaScript
     */
    protected function getSiteCustomJsFormField(): CodeEditor
    {
        return CodeEditor::make('payload.custom_js')
            ->label('自定义JavaScript')
            ->helperText('在这里输入你的自定义JavaScript代码')
            ->language(CodeEditor\Enums\Language::JavaScript)
            ->columnSpanFull();
    }

    /**
     * 产品功能模块控制
     */
    protected function getProductFeaturesModuleField(): Toggle
    {
        return Toggle::make('payload.enable_product_features')
            ->label('产品功能模块')
            ->helperText('显示产品功能特性介绍')
            ->default(true);
    }

    /**
     * 产品优势模块控制
     */
    protected function getProductAdvantagesModuleField(): Toggle
    {
        return Toggle::make('payload.enable_product_advantages')
            ->label('产品优势模块')
            ->helperText('显示产品优势和亮点')
            ->default(true);
    }

    /**
     * 用户作品展示模块控制
     */
    protected function getUserGalleryModuleField(): Toggle
    {
        return Toggle::make('payload.enable_user_gallery')
            ->label('用户作品展示模块')
            ->helperText('显示用户上传的精选作品')
            ->default(true);
    }

    /**
     * 价格计划模块控制
     */
    protected function getPricingPlansModuleField(): Toggle
    {
        return Toggle::make('payload.enable_pricing_plans')
            ->label('价格计划模块')
            ->helperText('显示服务套餐和定价信息')
            ->default(true);
    }

    /**
     * 友情链接管理
     */
    protected function getFriendlyLinksFormField(): Repeater
    {
        return Repeater::make('payload.friendly_links')
            ->label('友情链接管理')
            ->helperText('添加、编辑或删除友情链接。留空则使用默认链接。')
            ->schema([
                Grid::make()->schema([
                    TextInput::make('name')
                        ->label('链接名称')
                        ->required()
                        ->maxLength(50)
                        ->placeholder('例如：兰空图床'),
                    TextInput::make('title')
                        ->label('显示标题')
                        ->required()
                        ->maxLength(50)
                        ->placeholder('例如：兰空图床官网'),
                ]),
                TextInput::make('url')
                    ->label('链接地址')
                    ->required()
                    ->url()
                    ->placeholder('例如：https://www.lsky.pro'),
                Textarea::make('description')
                    ->label('链接描述')
                    ->maxLength(200)
                    ->placeholder('简要描述此链接（可选）'),
            ])
            ->addActionLabel('添加友情链接')
            ->reorderableWithButtons()
            ->collapsible()
            ->cloneable()
            ->columnSpanFull()
            ->defaultItems(0);
    }

    /**
     * 将相对路径转换为完整URL
     */
    protected function convertToFullUrl(?string $path): string
    {
        return $path ? Storage::url($path) : '';
    }
}