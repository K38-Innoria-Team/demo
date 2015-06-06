<?php
    class Form extends CI_Controller{
        public function index(){
            $this->load->helper(array('form','url'));
            $this->load->library('form_validation');
            $this->load->database();
            /*$this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required',
                array('required'=>'You must provide a %s.')
                );
            $this->form_validation->set_rules('passconf','Password Confirmation','required');
            $this->form_validation->set_rules('email','Email','required');*/
            /*$config=array(
                array(
                    'field'=>'username',
                    'label'=>'Username',
                    'rules'=>'required'
                ),
                array(
                    'field'=>'password',
                    'label'=>'Password',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'You must provide a %s.',
                    ),
                ),
                array(
                    'field'=>'passconf',
                    'label'=>'Password Confirmation',
                    'rules'=>'required'
                ),
                array(
                    'field'=>'email',
                    'label'=>'Email',
                    'rules'=>'required'
                )
            );
            $this->form_validation->set_rules($config);*/
            $this->form_validation->set_rules(
                'username','Username',
                'required|min_length[5]|max_length[12]|is_unique[user.NAME]',
                array(
                    'required'=>'You have not provided %s.',
                    'is_unique'=>'tontai'
                )
            );
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('passconf','Password Confirmation','required|matches[password]');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.PASSWORD]',
            array(
                'required'=>'You have not provided %s.',
                'valid_email'=>'%s is not correctly.',
                'is_unique'=>'This %s already exists.'
            )
            );
            $this->form_validation->set_rules('colors[]','Colors','required');
            $prefs['template'] = '

        {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
';

            $this->load->library('calendar', $prefs);

            echo $this->calendar->generate();

            $this->load->library('cart');
            $data = array(
                array(
                    'id'      => 'sku_123ABC',
                    'qty'     => 1,
                    'price'   => 39.95,
                    'name'    => 'T-Shirt',
                    'options' => array('Size' => 'L', 'Color' => 'Red')
                ),
                array(
                    'id'      => 'sku_567ZYX',
                    'qty'     => 1,
                    'price'   => 9.95,
                    'name'    => 'Coffee Mug'
                ),
                array(
                    'id'      => 'sku_965QRS',
                    'qty'     => 1,
                    'price'   => 29.95,
                    'name'    => 'Shot Glass'
                )
            );

            $this->cart->insert($data);
            $data = array(
                'rowid' => 'b99ccdf16028f015540f341130b6d8ec',
                'qty'   => 3
            );

            $this->cart->update($data);

// Or a multi-dimensional array

            $data = array(
                array(
                    'rowid'   => 'b99ccdf16028f015540f341130b6d8ec',
                    'qty'     => 3
                ),
                array(
                    'rowid'   => 'xw82g9q3r495893iajdh473990rikw23',
                    'qty'     => 4
                ),
                array(
                    'rowid'   => 'fh4kdkkkaoe30njgoe92rkdkkobec333',
                    'qty'     => 2
                )
            );

            $this->cart->update($data);
            if($this->form_validation->run()==FALSE){
                $this->load->view('Form/form_exam');
            }
            else{
                $this->load->view('Form/formsuccess');
            }
        }
    }