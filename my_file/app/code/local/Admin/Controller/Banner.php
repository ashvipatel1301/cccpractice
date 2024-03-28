<?php
class Admin_Controller_Banner extends Core_Controller_Admin_Action
{
    protected $_allowAction = [

        "login"
    ];
    public function formAction()
    {

        $layout = $this->getLayout();
        $bannerFormCss = Mage::getBaseUrl() . 'skin/css/product/form.css';
        $layout->getChild('head')->addCss($bannerFormCss);

        $child = $layout->getChild('content');

        $bannerForm = $layout->createBlock('banner/admin_form');

        $child->addChild('form', $bannerForm);

        $layout->toHtml();


    }
    public function saveAction()
    {
        try {
            echo "<pre>";
            //print_r($_FILES);die();
            if (!$this->getRequest()->isPost()) {
                throw new Exception("request is not valid");
            }
            $data = $this->getRequest()->getParams("bdata");
            $fileName = $_FILES['bdata']['name']['banner_image'];
            $data = array_merge($data, ["banner_image" => $fileName]);
            //print_r($data);die();
            $bannerModel = Mage::getModel("banner/banner");
            $bannerModel->setData($data)->save();
            print_r($bannerModel);

            //print_r($_FILES);die();
            if (isset($_FILES["bdata"]["name"])) {
                //echo "in if condi";
                $e = $_FILES["bdata"]["error"]["banner_image"];
                $n = $fileName;
                $t = $_FILES["bdata"]["tmp_name"]["banner_image"];
                $allowed = array('jpg', 'gif', 'png', 'PNG', 'jpeg','webp');
                $ext = explode(".", $n);

                if ($e == 0) {
                    if (!file_exists(Mage::getBaseDir('media/banner/') . $n)) {
                        if (in_array($ext[1], $allowed)) {
                            if (move_uploaded_file($t, Mage::getBaseDir('media/banner/') . $n)) {
                                echo ("file uploaded succesfully");
                            } else {
                                echo "file cannot be uploaded";
                            }
                        } else {
                            echo "this extension is not allowed";
                        }
                    } else {
                        echo "file already exist";

                    }
                } else {
                    echo "error:" . $e;
                }
            }

        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
}

    public function deleteAction()
    {
        $bannerModel = Mage::getModel('banner/banner')
            ->load($this->getRequest()->getParams('id', 0))  // this will return data which  thid id
            ->delete();
            $this->setRedirect('admin/banner/list');

    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $bannerList = $layout->createBlock('banner/admin_list');
        $child->addChild('bannerList', $bannerList);
        $layout->toHtml();

    }
}