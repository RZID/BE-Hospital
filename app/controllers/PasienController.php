<?php

declare(strict_types=1);

// Using dispatcher
use Phalcon\Mvc\Dispatcher;

// Using request
use Phalcon\Http\Request;

// Using model pasien
use app\models\Pasien;

// Using input sanitizer
use Phalcon\Filter\FilterFactory;

class PasienController extends \Phalcon\Mvc\Controller
{
    public function list()
    {
        // Get limit from query GET. If empty, it will return 10 as default
        $limit = (new Request())->get('limit') ? (new Request())->get('limit') : 10;

        // Get page from query GET. If empty, it will return 1 as default
        $page = (new Request())->get('page') ? (new Request())->get('page') : 1;

        // Make counter for offset query
        $offset = ((int)$page - 1) * $limit;

        // Query to database with Query Builder
        $pasienData = (new Pasien())::find([
            'limit' => $limit,
            'offset' => $offset
        ]);

        // Output
        if (count($pasienData) > 0) {
            return (new Responser())->ok("Success getting pasien data (limit {$limit} and page {$page})", [
                'pagination' => [
                    'amountOfData' => (new Pasien())::count(),
                    'currentPage' => $page,
                    'limit' => $limit,
                    'startFrom' => $offset,

                ],
                'data' => $pasienData
            ]);
        } else {
            return (new Responser())->ok('Success. However, the data is empty', [
                'pagination' => [
                    'amountOfData' => (new Pasien())::count(),
                    'currentPage' => $page,
                    'limit' => $limit,
                    'startFrom' => $offset,

                ],
                'data' => $pasienData
            ]);
        }
    }

    public function detail($id)
    {
        $pasienData = (new Pasien())::findFirst([
            'conditions' => "id = $id"
        ]);

        if ($pasienData) {
            return (new Responser())->ok('success', $pasienData);
        } else {
            return (new Responser())->ok('Success. However, the data is empty', null);
        }
    }

    public function add()
    {
        $model = new Pasien();

        $rawRequestJson =  (new Request())->getJsonRawBody();
        $data = [
            'name'      => (new FilterFactory())->newInstance()->sanitize($rawRequestJson->name, 'string'),
            'sex'       => (new FilterFactory())->newInstance()->sanitize($rawRequestJson->sex, 'string'),
            'religion'  => (new FilterFactory())->newInstance()->sanitize($rawRequestJson->religion, 'string'),
            'phone'     => (new FilterFactory())->newInstance()->sanitize($rawRequestJson->phone, 'absint'),
            'address'   => (new FilterFactory())->newInstance()->sanitize($rawRequestJson->address, 'string'),
            'nik'       => (new FilterFactory())->newInstance()->sanitize($rawRequestJson->nik, 'absint')
        ];

        if (
            !$data['name'] || !$data['sex'] || !$data['religion'] || !$data['phone'] || !$data['address'] || !$data['nik']
        ) return (new Responser())->bad_request(
            'Please fill all of input field and check type of input!',
            null
        );
        else {
            $model->assign($data);
            $result = $model->create();
            if ($result) {
                return (new Responser())->created("Data inserted succesfully on id = $model->id", null);
            } else {
                return (new Responser())->internal_server_error('An error occured', $model->getMessages());
            }
        }
    }

    public function update($id)
    {
        $model = (new Pasien())::findFirst(
            [
                "conditions" =>  "id = $id"
            ]
        );
        if ($model) {
            $rawRequestJson =  (new Request())->getJsonRawBody();
            $model->name        = isset($rawRequestJson->name)     ? (new FilterFactory())->newInstance()->sanitize($rawRequestJson->name, 'string')     : $model->name;
            $model->sex         = isset($rawRequestJson->sex)      ? (new FilterFactory())->newInstance()->sanitize($rawRequestJson->sex, 'string')      : $model->sex;
            $model->religion    = isset($rawRequestJson->religion) ? (new FilterFactory())->newInstance()->sanitize($rawRequestJson->religion, 'string') : $model->religion;
            $model->phone       = isset($rawRequestJson->phone)    ? (new FilterFactory())->newInstance()->sanitize($rawRequestJson->phone, 'absint')    : $model->phone;
            $model->address     = isset($rawRequestJson->address)  ? (new FilterFactory())->newInstance()->sanitize($rawRequestJson->address, 'string')  : $model->address;
            $model->nik         = isset($rawRequestJson->nik)      ? (new FilterFactory())->newInstance()->sanitize($rawRequestJson->nik, 'absint')      : $model->nik;

            $result = $model->update();
            if ($result) {
                return (new Responser())->ok("Data updated succesfully on id = $model->id", null);
            } else {
                return (new Responser())->internal_server_error('An error occured', $model->getMessages());
            }
        } else {
            return (new Responser())->bad_request("ID that you requested doesn't exist in our system", null);
        }
    }

    public function delete($id)
    {
        $model = (new Pasien())::findFirst(
            [
                "conditions" => "id = $id"
            ]
        );
        if ($model) {
            $model->delete();
            return (new Responser())->ok("Data deleted succesfully on id = $model->id", null);
        } else {
            return (new Responser())->bad_request("ID that you requested doesn't exist in our system", null);
        }
    }
    public function optionsBase()
    {
        return (new Responser())->preflight();
    }
}
