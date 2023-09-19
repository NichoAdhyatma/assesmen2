import speech_recognition as sr
import moviepy.editor
import pandas as pd
import os
import sys
from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
from pprint import pprint
from googletrans import Translator, constants
from IPython.core.display import Video
from feat.utils.io import get_test_data_path
from feat import Detector
from pydub import AudioSegment




#video_name = "video_test.mp4"
# audio_name = "audio_test.wav"

# Extract Audio dari Video
def main():
    video_file_path = sys.argv[1]
    print(video_file_path)
    video = moviepy.VideoFileClip(video_file_path)
    # video = moviepy.editor.VideoFileClip(video_name)
    # Extract the Audio
    # audio = video.audio
    # Export the Audio
    # audio.write_audiofile(audio_name)


# Analyst Voice to Text
# def voice_sentiment():
#     # Initialize recognizer class
#     r = sr.Recognizer()
#     # make audio object
#     audio = sr.AudioFile(audio_name)
#     # read audio object and transcribe
#     with audio as source:
#         audio = r.record(source)
#         result = r.recognize_google(audio, language="id-ID")

#     print(result)
#     # Translate to ENG
#     translator = Translator()
#     trans_res = translator.translate(result)
#     print(trans_res)

#     # Analyst
#     Sentence = [str(trans_res)]
#     analyser = SentimentIntensityAnalyzer()
#     for i in Sentence:
#         v = analyser.polarity_scores(i)
#         print(v)


def face_sentiment():
    # Make Object detector
    detector = Detector()

    # Import video 
    test_video_path = "video_test.mp4"
    Video(test_video_path, embed=False)
    video_prediction = detector.detect_video(test_video_path, skip_frames=30)

    # Convert ke dataframe
    video_prediction_df = pd.DataFrame(video_prediction)
    return video_prediction_df

    # print(video_prediction_df)
    # Nama CSV
    #csv_file_path = "result.csv"

    # Save Dataframe ke CSV
    #video_prediction_df.to_csv(csv_file_path, index=False)

    # Modifikasi CSV
    #df = pd.read_csv("result.csv")
    # Menambah "contempt" pada CSV dengan rata - rata "AU12 dan AU14"
    # Bisa diubah sesuai kebutuhan
    #df["contempt"] = df.loc[:, ["AU12","AU14"]].mean(axis = 1)
    # Filter kolom pada csv dan simpan pada variabel baru
    #happiness = df["happiness"]
    # Hasil penjumlahan
    #sadness = df["sadness"].sum()
    # Hasil rata - rata
    #contempt = df["contempt"].mean()

def resultcalc(video_prediction_df):
    df = pd.read_csv("result.csv")
    # anger,disgust,fear,happiness,sadness,surprise,neutral
    negative_score = df[["anger", "disgust","fear","sadness"]].mean().mean()
    positive_score = df[["happiness", "surprise"]].mean().mean()
    neutral_score = df["neutral"].mean()
    trust_score = df[["AU12", "AU14"]].mean().mean()
    # print("negatif: ",negative_score)
    # print("positif: ",positive_score)
    # print("netral: ",neutral_score)
    # print("trust: ",trust_score)
    return negative_score, positive_score, neutral_score, trust_score

main()
# voice_sentiment()
# video_prediction_df = face_sentiment()
# negative_score, positive_score, neutral_score, trust_score = resultcalc(video_prediction_df)
# import json
# output_data = {
#     "negative_score": negative_score,
#     "positive_score": positive_score,
#     "neutral_score": neutral_score,
#     "trust":trust_score,
# }
# print(json.dumps(output_data))
