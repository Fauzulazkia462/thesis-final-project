<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class jobseekerHomeController extends Controller
{
    public function index(Request $request){
        $id = Auth::user()->id;

        $experience = \DB::table('experience')
        ->select('experience.exp')
        ->where('experience.user_id', $id)
        ->where('experience.exp', '<>', NULL)
        ->get();

        $education = \DB::table('education')
        ->select('education.edu')
        ->where('education.user_id', $id)
        ->where('education.edu', '<>', NULL)
        ->get();

        $skill = \DB::table('skills')
        ->select('skills.skill')
        ->where('skills.user_id', $id)
        ->where('skills.skill', '<>', NULL)
        ->get(); 

        $jobReq = \DB::table('job_req')
        ->select('job_req.req', 'job_req.job_id')
        ->get();
        
        $matchedJobs = [];
        $totalReq = [];

        foreach ($jobReq as $req) {
            $score = 0;
            $jobId = $req->job_id;
            
            $requirements = \DB::table('job_req')
            ->select('job_req.req')
            ->where('job_req.job_id', $jobId)
            ->get();
            
            $totalRequirements = count($requirements);
            $totalReq[$jobId] = $totalRequirements;

            // Check if user's experience matches job requirements
            foreach ($experience as $exp) {
                if (stripos($req->req, $exp->exp) !== false) {
                    $score += 1; // Increase the score if there is a match
                }
            }
            // Check if user's education matches job requirements
            foreach ($education as $edu) {
                if (stripos($req->req, $edu->edu) !== false) {
                    $score += 1; // Increase the score if there is a match
                }
            } 
            
            // Check if user's skills matches job requirements
            foreach ($skill as $s) {
                if (stripos($req->req, $s->skill) !== false) {
                    $score += 1; // Increase the score if there is a match
                }
            } 
            
            // Increment the matched score for the same jobId
            if ($score > 0) {
                if (isset($matchedJobs[$jobId])) {
                    $matchedJobs[$jobId] += $score;
                } else {
                    $matchedJobs[$jobId] = $score;
                }
            }
        }
        // return $totalReq;
        // return $matchedJobs;

        // Calculate the total number of requirements for each job
        $totalRequirementsByJob = [];

        foreach ($matchedJobs as $jobId => $score) {
            if (isset($totalReq[$jobId])) {
                $totalRequirementsByJob[$jobId] = $totalReq[$jobId];
            }
        }

        // Calculate the percentage for each matched job
        $jobsData = [];

        foreach ($matchedJobs as $jobId => $score) {
            $scorePercentage = 0;

            if (isset($totalRequirementsByJob[$jobId]) && $totalRequirementsByJob[$jobId] > 0) {
                $scorePercentage = ($score / $totalRequirementsByJob[$jobId]) * 100;
            }

            $jobData = \DB::table('jobs')
                ->where('jobs.id', $jobId)
                ->first();

            if ($jobData) {
                // $jobData->score = $scorePercentage;
                $jobData->score = number_format($scorePercentage); // making the percentage become integer. if want to make it decimal, add ", 2" after $scorePercentage as the parameter of the function
                $jobsData[] = $jobData;
            }
        }
        
        // Sorting the jobsData based on the scorePercentage in descending order
        usort($jobsData, function ($a, $b) {
            return $b->score - $a->score;
        });

        // FILTERING THE JOBS BASED ON THE SELECT OPTION ON THE VIEW
        if ($request->filter) {
            $filteredJobsData = array_filter($jobsData, function ($job) {
                return $job->score >= 1;
            });
    
            // Sort the filtered jobsData based on the score in descending order
            usort($filteredJobsData, function ($a, $b) {
                return $b->score - $a->score;
            });
    
            $jobsData = array_values($filteredJobsData);
        }

        if ($request->filter == '49') {
            $filteredJobsData = array_filter($jobsData, function ($job) {
                return $job->score <= 50;
            });
    
            // Sort the filtered jobsData based on the score in descending order
            usort($filteredJobsData, function ($a, $b) {
                return $b->score - $a->score;
            });
    
            $jobsData = array_values($filteredJobsData);
        }
        if ($request->filter == '50') {
            $filteredJobsData = array_filter($jobsData, function ($job) {
                return $job->score >= 50;
            });
    
            // Sort the filtered jobsData based on the score in descending order
            usort($filteredJobsData, function ($a, $b) {
                return $b->score - $a->score;
            });
    
            $jobsData = array_values($filteredJobsData);
        }

        if ($request->filter == '60') {
            $filteredJobsData = array_filter($jobsData, function ($job) {
                return $job->score >= 60;
            });
    
            // Sort the filtered jobsData based on the score in descending order
            usort($filteredJobsData, function ($a, $b) {
                return $b->score - $a->score;
            });
    
            $jobsData = array_values($filteredJobsData);
        }

        if ($request->filter == '70') {
        $filteredJobsData = array_filter($jobsData, function ($job) {
            return $job->score >= 70;
        });

        // Sort the filtered jobsData based on the score in descending order
        usort($filteredJobsData, function ($a, $b) {
            return $b->score - $a->score;
        });

        $jobsData = array_values($filteredJobsData);
        }

        if ($request->filter == '80') {
            $filteredJobsData = array_filter($jobsData, function ($job) {
                return $job->score >= 80;
            });
    
            // Sort the filtered jobsData based on the score in descending order
            usort($filteredJobsData, function ($a, $b) {
                return $b->score - $a->score;
            });
    
            $jobsData = array_values($filteredJobsData);
        }

        if ($request->filter == '90') {
            $filteredJobsData = array_filter($jobsData, function ($job) {
                return $job->score >= 90;
            });
    
            // Sort the filtered jobsData based on the score in descending order
            usort($filteredJobsData, function ($a, $b) {
                return $b->score - $a->score;
            });
    
            $jobsData = array_values($filteredJobsData);
        }

        if ($request->filter == '100') {
            $filteredJobsData = array_filter($jobsData, function ($job) {
                return $job->score == 100;
            });
    
            // Sort the filtered jobsData based on the score in descending order
            usort($filteredJobsData, function ($a, $b) {
                return $b->score - $a->score;
            });
    
            $jobsData = array_values($filteredJobsData);
        }

        // return $jobsData;
        return view('jobseeker.home.index', compact('jobsData'));

    }
}
