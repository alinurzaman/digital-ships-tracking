package com.example.digitalmengawasibcgresik;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class GantiPassword extends AppCompatActivity {
    private EditText password1, password2;
    private Button btn_ganti;
    private ProgressBar loading;
    private static String URL_SUBMITGANTI = "http://laporbcgresik.com/androidgantipass.php";
    private String idagen;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ganti_password);

        Bundle extras = getIntent().getExtras();
        idagen = extras.getString("idagen");

        password1 = findViewById(R.id.password1);
        password2 = findViewById(R.id.password2);
        btn_ganti = findViewById(R.id.btn_submit_ganti);
        loading = findViewById(R.id.loading_gantipassword);

        btn_ganti.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Submit();
            }
        });
    }

    private void Submit() {
        loading.setVisibility(View.VISIBLE);
        btn_ganti.setVisibility(View.GONE);

        final String mPassword1 = password1.getText().toString().trim();
        final String mPassword2 = password2.getText().toString().trim();
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_SUBMITGANTI, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try{
                    JSONObject jsonObject = new JSONObject(response);
                    String success = jsonObject.getString("success");
                    if(success.equals("1")){
                        Toast.makeText(GantiPassword.this, "Ganti password berhasil!", Toast.LENGTH_LONG).show();
                        loading.setVisibility(View.GONE);
                        btn_ganti.setVisibility(View.VISIBLE);
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                    Toast.makeText(GantiPassword.this, "Ganti password gagal: " + e.toString(), Toast.LENGTH_LONG).show();
                    loading.setVisibility(View.GONE);
                    btn_ganti.setVisibility(View.VISIBLE);
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(GantiPassword.this, "Ganti password gagal: " + error.toString(), Toast.LENGTH_LONG).show();
                loading.setVisibility(View.GONE);
                btn_ganti.setVisibility(View.VISIBLE);
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("password1", mPassword1);
                params.put("password2", mPassword2);
                params.put("idagen", idagen);
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        this.finish();
    }
}
