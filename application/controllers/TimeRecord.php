<?php
class TimeRecord extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('TimeRecord_model');
    }
public function process_time_record()
    {
        // Process the form submission to add time in/out record
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $qrcodeOrId = $this->input->post('qrcode_or_id');
            $employee = $this->TimeRecord_model->get_employee_by_qrcode_or_id($qrcodeOrId);
            $user_id = $this->session->userdata('user_id'); // Get the user_id from the session

            if ($employee) {
                $data = array(
                    'employee_id' => $employee->id,
                    'user_id' => $user_id, // Set the user_id
                    'date_added' => date('Y-m-d'),
                    'time_in' => date('Y-m-d H:i:s')
                );

                // Check if the employee already has a time in record for the current date
                $existingRecord = $this->TimeRecord_model->get_time_record_by_date_employee($data['date_added'], $employee->id);

                if (!$existingRecord) {
                    // If there is no record for the employee on the current date, add a new record (Time In)
                    $this->TimeRecord_model->add_time_record($data);
                } else {
                    // If a record exists, update time_out for the existing record (Time Out)
                    $this->TimeRecord_model->update_time_out($existingRecord->id, date('Y-m-d H:i:s'));
                }

                redirect('time_record');
            } else {
                // Employee not found
                echo "Employee not found!";
            }
        } else {
            $this->load->view('time_record');
        }
    }
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $qrcodeOrId = $this->input->post('qrcode_or_id');
            $employee = $this->TimeRecord_model->get_employee_by_qrcode_or_id($qrcodeOrId);

            if ($employee) {
                $data = array(
                    'employee_id' => $employee->id,
                    'user_id' => $this->session->userdata('user_id'),
                    'date_added' => date('Y-m-d'),
                    'time_in' => date('Y-m-d H:i:s')
                );

                // Check if the employee already has a time in record for the current date
                $existingRecord = $this->TimeRecord_model->get_time_records_by_date($data['date_added']);

                if (!$existingRecord) {
                    $this->TimeRecord_model->add_time_record($data);
                } else {
                    // Update time_out for the existing record
                    $this->TimeRecord_model->update_time_out($existingRecord->id, date('Y-m-d H:i:s'));
                }
            } else {
                // Employee not found
                echo "Employee not found!";
            }
        }

        // Load the view regardless of whether it was a form submission or not
        $this->load->view('time_record');
    }

//      public function index() {
//     // Load the TimeRecord_model
//     $this->load->model('TimeRecord_model');

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $qrcodeOrId = $this->input->post('qrcode_or_id');
//         $employee = $this->TimeRecord_model->get_employee_by_qrcode_or_id($qrcodeOrId);

//         if ($employee) {
//             $data = array(
//                 'employee_id' => $employee->id,
//                 'user_id' => $this->session->userdata('user_id'),
//                 'date_added' => date('Y-m-d'),
//                 'time_in' => date('Y-m-d H:i:s')
//             );

//             // Check if the employee already has a time in record for the current date
//             $existingRecord = $this->TimeRecord_model->get_time_records_by_date($data['date_added']);

//             if (!$existingRecord) {
//                 $this->TimeRecord_model->add_time_record($data);
//             } else {
//                 // Update time_out for the existing record
//                 $this->TimeRecord_model->update_time_out($existingRecord->id, date('Y-m-d H:i:s'));
//             }
//         } else {
//             // Employee not found
//             echo "Employee not found!";
//         }
//     }

//     // Get the time records from the database
//     // $data['time_records'] = $this->TimeRecord_model->get_time_records();

//     // Load the time_record.php view
//     $this->load->view('time_record', $data);
// }

    public function listing() {
        // Get time records for the current date
        $data['time_records'] = $this->TimeRecord_model->get_time_records_by_date(date('Y-m-d'));
        $this->load->view('time_record_listing', $data);
    }
  public function view($date) {
    $data['date'] = $date;
    $data['time_records'] = $this->TimeRecord_model->get_time_records_by_date($date);
    $this->load->view('daily_time_record', $data);
}
 public function get_time_record_by_date_employee($date, $employee_id)
    {
        $this->db->where('date_added', $date);
        $this->db->where('employee_id', $employee_id);
        $query = $this->db->get('time_records');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    public function generate_qrcode($employee_id) {

    $this->load->library('BaconQrCode');

    $qr_code_data = 'Employee ID: ' . $employee_id;
    $qr_code_image = $this->baconqrcode->generate($qr_code_data);

    header('Content-Type: image/png');
    echo $qr_code_image;
}


}
?>
